<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Examinations Controller
 *
 * @property \App\Model\Table\ExaminationsTable $Examinations
 */
 define('EXTRA_TIME_EXAMINATION',10);
class ExaminationsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize() {
        parent::initialize();
		$this->Auth->deny('test');
    }

    public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
       // $this->viewBuilder()->layout(false);
    }

    public function index() {
		//$userbranch=$this->userBranch();
	//pr($userbranch);
		//die;
		$is_allowtest=true;
		
			$examination=$this->Examinations->find()->where(['examination_end_date >="' . date('Y-m-d') . '"','Examinations.is_active'=>1])->contain(['Courses','Subjects']);
			$is_allowtest=false;
		
		
		$this->set(compact('examination','is_allowtest'));
        $this->set('_serialize', ['examination']);
    }
	public function centre($slug=null) {
		$userbranch=$this->userBranch();
		$is_allowtest=true;
		if(!empty($userbranch)){
		$examination=$this->Examinations->find()->contain(['Branches','Courses','Subjects'])->where(['branch_id IN ('.implode(',',$userbranch).')','examination_end_date >="' . date('Y-m-d') . '"'])->innerJoinWith('Branches', function ($q) {
    return $q->where(['Branches.slug' => $slug]);
});
		}else{
			$examination=$this->Examinations->find()->where(['examination_end_date >="' . date('Y-m-d') . '"'])->contain(['Branches','Courses','Subjects'])->innerJoinWith('Branches', function ($q) {
    return $q->where(['Branches.slug' => $slug]);
});
$is_allowtest=false;
		}
		
		
		
		$this->set(compact('examination','is_allowtest'));
        $this->set('_serialize', ['examination']);
		$this->render('index');
    }
	public function course($slug=null) {
		$is_allowtest=true;
		$userbranch=$this->userBranch();
		if(!empty($userbranch)){
		$examination=$this->Examinations->find()->where(['branch_id IN ('.implode(',',$userbranch).')','examination_end_date >="' . date('Y-m-d') . '"'])->contain(['Branches','Courses','Subjects'])->innerJoinWith('Courses', function ($q) use($slug) {
    return $q->where(['Courses.slug' => $slug]);
});
		}else{
			$examination=$this->Examinations->find()->where(['examination_end_date >="' . date('Y-m-d') . '"'])->contain(['Branches','Courses','Subjects'])->innerJoinWith('Courses', function ($q) use($slug) {
    return $q->where(['Courses.slug' => $slug]);
});
$is_allowtest=false;
		}
		
		
		
		$this->set(compact('examination','is_allowtest'));
        $this->set('_serialize', ['examination']);
		$this->render('index');
    }
	
	public function subject($slug=null) {
		$userbranch=$this->userBranch();
		$is_allowtest=true;
		if(!empty($userbranch)){
		$examination=$this->Examinations->find()->where(['branch_id IN ('.implode(',',$userbranch).')','examination_end_date >="' . date('Y-m-d H:i:s') . '"'])->contain(['Branches','Courses','Subjects'])->innerJoinWith('Subjects', function ($q) use($slug) {
    return $q->where(['Subjects.slug' => $slug]);
});
		}else{
			$examination=$this->Examinations->find()->where(['examination_end_date >="' . date('Y-m-d H:i:s') . '"'])->contain(['Branches','Courses','Subjects'])->innerJoinWith('Subjects', function ($q) use($slug) {
    return $q->where(['Subjects.slug' => $slug]);
});
$is_allowtest=false;
		}
		
		
		
		$this->set(compact('examination','is_allowtest'));
        $this->set('_serialize', ['examination']);
		$this->render('index');
    }
	
	 public function test($slug = null) {
		$this->viewBuilder()->layout(false);
        $this->set('slug', $slug);
    }
	public function addTest($test_id){
		$user_id=$this->Auth->user('id');
	        $examination=$this->Examinations->get($test_id);
		$count=$this->Examinations->UserExaminations->find()->where(['examination_id'=>$test_id,'user_id'=>$user_id,'is_completed'=>0])->count();
		if($count>0){
			 //$this->Flash->success(__('The examination has been already  saved.'));
			}else{
		$ex=$this->Examinations->UserExaminations->newEntity();
		$ex->examination_id=$test_id;
		$ex->user_id=$user_id;
		if($examination->is_paid){
			$ex->is_allow=0;
			}else{
				$ex->is_allow=1;
				}
		
		$this->Examinations->UserExaminations->save($ex);
		//$this->Flash->success(__('The examination has been  saved.'));
		}
		return $this->redirect(['controller' => 'Home','action' => 'dashboard','prefix' => 'student']);
		}
    /*
     * examination  save
     */
 
    public function saveQuizAnswerTest() {
        $this->_jsonVars = $this->request->input('json_decode');
        $tblExaminationObj = TableRegistry::get('Examinations');
        $tblUserExaminationsObj = TableRegistry::get('UserExaminations');
        $tblUserExaminationAnswersObj = TableRegistry::get('UserExaminationAnswers');
        $questionanswerObj = $this->_jsonVars->data;
		//pr($questionanswerObj);
        $totalTimeTaken = $this->_jsonVars->timeTaken;
        $user_id = $this->Auth->user('id');
        $user_examination = $tblUserExaminationsObj->find('all')->where(['examination_id' => $questionanswerObj->id, 'user_id' => $user_id, 'is_completed' => 0])->first();
        $user_examination->time_taken = $totalTimeTaken;
        $user_examination->marks_obtained = 0;
        $user_examination->is_completed = 1;
        $user_examination->attempt_date = date('Y-m-d H:i:s');
        $user_examination_id = $user_examination->id;

        $all_examinations = $tblExaminationObj->find('all')->where(['Examinations.id' => $questionanswerObj->id])->contain(['ExaminationQuestions.Questions.QuestionAnswers'])->first();
        $i = 0;
        $result = 0;
        $correctAnswer = array();
		//pr($all_examinations);
		//die;
        foreach ($all_examinations['examination_questions'] as $q) {
            //$user_examination_answer = $tblUserExaminationAnswersObj->newEntity();
            $user_examination_answer = $tblUserExaminationAnswersObj->find('all')->where(['user_examination_id' => $user_examination_id, 'question_id' => $q->question_id])->first();
            $j = 0;
			//pr( $user_examination_answer);
			//die;
            foreach ($q->question['question_answers'] as $a) {

                if (!empty($a->q_option)) {
                    if ($questionanswerObj->examination_questions[$i]->examination_question_answers[$j]->is_correct == 1) {

                        if ($a->is_correct == 1) {
                            $user_examination_answer->is_correct = 1;
                            $result = $result + $all_examinations->each_question_mark;
                        } else {
                            $user_examination_answer->is_correct = 0;
                            $result = $result - $all_examinations->negative_marks;
                        }
                    }
                    if ($a->is_correct == 1) {
                        $correctAnswer[] = array('question_id' => $q->id, 'answer_id' => $questionanswerObj->examination_questions[$i]->examination_question_answers[$j]->id);
                    }
                    if ($questionanswerObj->examination_questions[$i]->examination_question_answers[$j]->is_correct == 1) {

                        $user_examination_answer->examination_answer_id = $a->id;
                    }
                }
                $j++;
            }
            $user_examination_answer->user_examination_id = $user_examination_id;
            $user_examination_answer->examination_question_id = $q->id;
            $tblUserExaminationAnswersObj->save($user_examination_answer);
          

            $i++;
        }

        $user_examination->marks_obtained = $result;
        $tblUserExaminationsObj->save($user_examination);

        $user_result_data = $tblUserExaminationsObj->find('all')->where(['id' => $user_examination->id])->contain(['UserExaminationAnswers'])->first();
        $k = 0;
        foreach ($user_result_data->user_examination_answers as $ua) {
            $ua->correct_answer = $correctAnswer[$k]['answer_id'];
            $k++;
        }



        $UserTest = $tblUserExaminationsObj->find('all')->where(['UserExaminations.examination_id' => $questionanswerObj->id, 'is_last_attempted' => 0])->order(['UserExaminations.marks_obtained' => 'DESC', 'UserExaminations.time_taken' => 'ASC'])->limit(5)->contain(['Users' => function($q) {
                        return $q->autoFields(false)
                                        ->select(['name', 'image']);
                    }])->toArray();

                echo json_encode(['success' => 1, 'data' => $user_result_data, 'msg' => 'result submit successfully', 'user_data' => $UserTest]);
                $this->autoRender = FALSE;
 
            }

            /*
             * examination load
             */
            
            public function loadQuizzQuestionTest($slug = null) {
                $user_id =$this->Auth->user('id');;
                $tblExaminationObj = TableRegistry::get('Examinations');
                $examinations = $this->Examinations->findBySlug($slug)->first();
                $examinationDate = $examinations->examination_date;
                $examinationStartTime = $examinations->start_time;
                $examinationEndTime = $examinations->end_time;
                $examinationAllotedTime = $examinations->time_alloted;
                $examinationAllowTime = $examinations->allow_time;
				$diffInSeconds=0;
				//pr($examinations);
            $date_now = new \DateTime(date('Y-m-d'));
                $date_start = new \DateTime($examinationDate);
                $end_time  = new \DateTime($examinationDate . " " . date('H:i:s', strtotime($examinationEndTime)));
                $new_end_time=$end_time;
                 $totalTime = $examinations->time_alloted;
                $new_end_time=$new_end_time->modify("+" . intval(EXTRA_TIME_EXAMINATION) . " minutes");
				 $date_end = new \DateTime($examinations->examination_end_date);
                /*  if ($date_now < $date_start) {
                     $examinations->time_alloted = intval($totalTime)+intval(EXTRA_TIME_EXAMINATION);
                     $examinations->totaltime=intval($totalTime);
                    $examinations->extra_end_time=intval(EXTRA_TIME_EXAMINATION);
                    $diffInSeconds = $date_start->getTimestamp() - $date_now->getTimestamp();
                   // echo json_encode(['success' => 3, 'data' => $examinations, 'difference' => $diffInSeconds, 'msg' => 'Please wait. Examination  not started now.']);
                    // return true;
                   // die;
                } else {
                    $diffInSeconds = $date_now->getTimestamp() - $date_start->getTimestamp();
                }
               */
				//$diffInSeconds =1000;
				// $totalTime =3000;
                $tblUserExaminationsObj = TableRegistry::get('UserExaminations');
                $tblUserExaminationAnswersObj = TableRegistry::get('UserExaminationAnswers');
                $user_result_query = $tblUserExaminationsObj->find('all')->where(['examination_id' => $examinations->id, 'user_id' => $user_id, 'is_completed' => 1])->contain(['Examinations.ExaminationQuestions']);
				
             if ($user_result_query->count() > 0 && $examinations->one_time) {
                   /* if ($date_now < $new_end_time) {

                            echo json_encode(['success' => 6, 'data' => $examinations, 'msg' => ' Please Wait for your result.']);
                            // return true;
                            die;
                        }*/
                $user_id = $this->Auth->user('id');
                $user_examination = $tblUserExaminationsObj->find('all')->where(['examination_id' => $examinations->id, 'user_id' => $user_id, 'is_completed' => 1])->first();
        
                $all_result_examinations = $tblUserExaminationAnswersObj->find('all')->where(['UserExaminationAnswers.user_examination_id' => $user_examination->id])->contain(['UserExaminations','ExaminationQuestions.Questions.QuestionAnswers']);
                     
                    echo json_encode(['success' => 2, 'data' => $user_result_query->first(),'result'=>$all_result_examinations, 'msg' => 'your are already attempted this test']);
                    // return true;
                    die;
                }
               

                $user_result_query = $tblUserExaminationsObj->find('all')->where(['examination_id' => $examinations->id, 'user_id' => $user_id, 'is_completed' => 0])->contain(['UserExaminationAnswers']);
                if ($user_result_query->count() > 0) {
                    $user_result_data = $user_result_query->first();
                    if ($user_result_data->is_start == 1) {

                        $attemptfirst = false;
                        $last_attempted_question_id = $user_result_data->last_attempted_question_id;
                        $time_taken = $user_result_data->time_taken;
						$diffInSeconds=$time_taken;
                       if ($date_now > $date_end) {

                            echo json_encode(['success' => 5, 'data' => $examinations, 'msg' =>"Sorry examination time over"]);
                            // return true;
                            die;
                        }
                    } else {

                        if ($date_now > $date_start->modify("+" . intval($examinationAllowTime) . " minutes") && $date_now<$new_end_time) {

                           // echo json_encode(['success' => 4, 'data' => $examinations, 'msg' => 'Sorry!. Examination end .']);
                            // return true;
                           // die;
                        }
					
                        if ($date_end< $date_now) {
							

                            echo json_encode(['success' => 4, 'data' => $examinations, 'msg' => 'Sorry!. Examination end.']);
                            // return true;
                            die;
                        }
                        $attemptfirst = false;
                        $last_attempted_question_id = 0;
                        $time_taken = 0;
                    }
                } else {
                    $user_result_data = [];
                    $attemptfirst = true;
                    $last_attempted_question_id = 0;
                    $time_taken = 0;
                }
                $j = 0;
                $all_examinations = $tblExaminationObj->find('all')->where(['Examinations.slug' => $slug])->contain(['ExaminationQuestions.Questions.QuestionAnswers','ExaminationQuestions.Questions'])->first();

                $all_examinations->is_attempted_first = $attemptfirst;
                $all_examinations->is_lastquestion_id = $last_attempted_question_id;
                $all_examinations->is_lastquestion_index = -1;
                $all_examinations->time_taken = $diffInSeconds;
                $all_examinations->time_alloted = intval($totalTime)+intval(10);
                $all_examinations->totaltime=intval($totalTime);
                $all_examinations->extra_end_time=intval(10);

                $allquestion_id = [];
                foreach ($all_examinations['examination_questions'] as $question) {
                    $allquestion_id[] = $question['question_id'];
                }

                $lastsetquestion = [];
                if (!$attemptfirst) {

                    foreach ($user_result_data->user_examination_answers as $question) {
                        $lastsetquestion[] = $question->question_id;
                    }

                    $deleteQuestion = [];
                    foreach ($lastsetquestion as $lastId) {
                        if (!in_array($lastId, $allquestion_id)) {
                            $deleteQuestion[] = intval($lastId);
                        }
                    }
                }

                foreach ($all_examinations['examination_questions'] as $q) {
                    if (!$attemptfirst) {
                        if (in_array($q->question_id,$lastsetquestion)) {
                            $j = array_search($q->question_id, $lastsetquestion);


                            if ($user_result_data->user_examination_answers[$j]->examination_answer_id > 0) {
                                $q->is_attemped = 1;
                            } else {
                                $q->is_attemped = 0;
                            }
                            if ($q->question_id == $last_attempted_question_id) {
                                $all_examinations->is_lastquestion_index = $j;
                            }
                        } else {
                            $q->is_attemped = 0;
                            $user_examination_answer = $tblUserExaminationAnswersObj->newEntity();
                            $j = 0;
                            $user_examination_answer->user_examination_id = $user_result_data->id;
                            $user_examination_answer->examination_question_id = $q->id;
							$user_examination_answer->question_id = $q->question_id;
                            $tblUserExaminationAnswersObj->save($user_examination_answer);
                        }
                    } else {
                        $q->is_attemped = 0;
                    }

                    $optionArr = [];
                    foreach ($q->question->question_answers as $a) {
                        if (!$attemptfirst) {
                            if (in_array($q->question_id, $lastsetquestion)) {
                                if (!empty($a->q_option)) {
                                    $a->is_correct = ($user_result_data->user_examination_answers[$j]->examination_answer_id == $a->id) ? 1 : 0;
                                    $optionArr[] = $a;
                                }
                            } else {
                                if (!empty($a->q_option)) {
                                    $a->is_correct = 0;
                                    $optionArr[] = $a;
                                }
                            }
                        } else {
                            if (!empty($a->q_option)) {
                                $a->is_correct = 0;
                                $optionArr[] = $a;
                            }
                        }
                    }
                    $q['examination_question_answers'] = $optionArr;
                }
                if (!empty($deleteQuestion)) {
                    $tblUserExaminationAnswersObj->updateAll(['is_deleted' => 1], ['user_examination_id' => $user_result_data->id, 'examination_question_id  IN' => $deleteQuestion]);
                }
				
			
                if ($attemptfirst) {
                    $user_examination = $tblUserExaminationsObj->newEntity();
                    //$user_id = $this->Auth->user('id');
                    $user_examination->examination_id = $all_examinations->id;
                    $user_examination->user_id = $user_id;
                    $user_examination->is_start = 1;
                    $user_examination->time_taken = 0;
                    $user_examination->marks_obtained = 0;
                    $user_examination->attempt_date = date('Y-m-d H:i:s');

                    /*                     * *** Update Previous Attempted **** */
                    $tblUserExaminationsObj->save($user_examination);
                    $user_examination_id = $user_examination->id;
                    foreach ($all_examinations['examination_questions'] as $q) {
                        $user_examination_answer = $tblUserExaminationAnswersObj->newEntity();
                        $j = 0;
                        $user_examination_answer->user_examination_id = $user_examination_id;
                        $user_examination_answer->examination_question_id = $q->id;
						$user_examination_answer->question_id = $q->question_id;
                        $tblUserExaminationAnswersObj->save($user_examination_answer);
                    }
                }
                echo json_encode(['success' => 1, 'data' => $all_examinations,'msg' => 'load question']);
                $this->autoRender = FALSE;
            }

            /*             * **Save examination each step**** */

            public function saveQuizEachStep() {
                $user_id = $this->Auth->user('id');;
                $this->_jsonVars = $this->request->input('json_decode');
                $tblUserExaminationsObj = TableRegistry::get('UserExaminations');
                $tblUserExaminationAnswersObj = TableRegistry::get('UserExaminationAnswers');
                $user_result_query = $tblUserExaminationsObj->find('all')->where(['examination_id' => $this->_jsonVars->examinationid, 'user_id' => $user_id, 'is_completed' => 0])->first();

                $saveUserAnswer = $tblUserExaminationAnswersObj->find()->where(['user_examination_id' => $user_result_query->id, 'question_id' => $this->_jsonVars->questionid])->first();
               
                $saveUserAnswer->examination_question_id = $this->_jsonVars->questionid;

                $saveUserAnswer->examination_answer_id = $this->_jsonVars->answerid;
                $tblUserExaminationAnswersObj->save($saveUserAnswer);
                $user_result_query->last_attempted_question_id = $this->_jsonVars->questionid;
                $user_result_query->time_taken = $this->_jsonVars->timeTaken;
                $tblUserExaminationsObj->save($user_result_query);
                echo json_encode(['success' => 1, 'msg' => 'load question']);
                $this->autoRender = FALSE;
            }
		public function userBranch(){
			 $tblUserBranchesObj = TableRegistry::get('UserBranches');
			 $user_id = $this->Auth->user('id');
			$userbranch = $tblUserBranchesObj->find()->select(['branch_id'])->where(['user_id'=>$user_id,'is_active'=>1]);
			$ids=[];
			foreach($userbranch as $ub){
				$ids[]=$ub->branch_id;
			}
			 return $ids;
		}
          /*
     * examination  save
     */

}