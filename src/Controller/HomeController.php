<?php
declare(strict_types=1);
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController
{
     public function initialize(): void
	 {
        parent::initialize();
       
       
    }


    
    
   public function index(){
       
   
    $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
    $page=$branchObj->findBySlug('home')->first();
    $this->_display_meta = TRUE;
    $this->setMeta($page);
    $Sliders = TableRegistry::getTableLocator()->get('Sliders');
    $slideralls=$Sliders->find("all",[
    "order"=>["id"=>"desc"]
    ])->where([ 'is_deleted' => "0",'is_active'=>1 ] );
      
    $this->set(compact('slideralls'));
	
	$test = TableRegistry::getTableLocator()->get('Testimonials');
    $testimonial=$test->find("all",[
    "order"=>["id"=>"desc"]
    ])->where([ 'is_deleted' => "0",'is_active'=>1 ] );
	

      
    $this->set(compact('testimonial'));
	
	$banking = TableRegistry::getTableLocator()->get('Examinations');
    $bankingalls=$banking->find("all",[
    "order"=>["Examinations.id"=>"asc"]
    ])->contain(['Reviews'])->where([ 'Examinations.is_deleted' => "0",'Examinations.is_active'=>1,'Examinations.examination_category_id'=>1 ] )->limit(5);
	
	$this->set(compact('bankingalls'));
	
	 $insurancealls=$banking->find("all",[
    "order"=>["Examinations.id"=>"asc"]
    ])->contain(['Reviews'])->where([ 'Examinations.is_deleted' => "0",'Examinations.is_active'=>1,'Examinations.examination_category_id'=>3 ] )->limit(5);
      
    $this->set(compact('insurancealls'));
      





	   }
	public function about(){
		
		    $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
			$page=$branchObj->findBySlug('about-us')->first();
			$this->_display_meta = TRUE;
			$this->setMeta($page);
			
				$test = TableRegistry::getTableLocator()->get('Testimonials');
    $testimonial=$test->find("all",[
    "order"=>["id"=>"desc"]
    ])->where([ 'is_deleted' => "0",'is_active'=>1 ] );
	

      
    $this->set(compact('testimonial'));
   
   }

   public function addressbook(){

         
		 
	     $user_delivery = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
		 $user2=$user_delivery->find("all")->where(['user_id' => $this->Auth->user('id')]);
		$this->set('address', $user2);
   }
   	public function myaccount(){
   	    
   	
   	    if($this->Auth->user('id'))
		{
	     $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
	   
		 $user1=$tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
		 $this->set('user1', $user1);
		 
		    $staticPage = $tblUserObj1->get($this->Auth->user('id'), [
           'contain' => []
       ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
           $usersave = $tblUserObj1->patchEntity($staticPage, $this->request->getData());
           if ($tblUserObj1->save($usersave)) {
               $this->Flash->success(__('User Information is Successfully Updated.'));

               return $this->redirect(['action' => 'myaccount']);
           } else {
               $this->Flash->error(__('User Information is not Successfully Updated.'));
           }
       }
		}
		else
		{
			return $this->redirect(['controller'=>'Home','action' => 'index']);
		}

   }
   public function contact(){
       
        $branchObj = TableRegistry::getTableLocator()->get('StaticPages');
		$page=$branchObj->findBySlug('contact')->first();
		$this->_display_meta = TRUE;
		$this->setMeta($page);
       
    if ($this->request->is('post')) {
     if(isset($_POST['sub']))
     {
         
			$name=$this->request->getData('name');
			$email=$this->request->getData('email');
			$mobile=$this->request->getData('mobile');
			$message=$this->request->getData('message');
			$admin_email='support@febino.in';
			

            $this->loadComponent('SendMail');
            $this->SendMail->sendMail(8, $admin_email,['name' =>$name , 'email'=>$email , 'mobile'=>$mobile , 'message'=>$message ]);
            $this->Flash->error(__('We have received your Enquiry'));
        }
            }
   }
   public function myreviews(){
       
       $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
		 $user1=$tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
		 $this->set('user1', $user1);
		$Products = TableRegistry::get('Products');
		$Reviews = TableRegistry::get('Reviews');
		$pro=$Reviews->find("all")->contain(['Products','ReviewImages'])->where(['Reviews.user_id' => $this->Auth->user('id')]);
		//pr($pro->first());
		$this->set('pro', $pro);
   }
   public function myorders(){
	    if($this->Auth->user('id'))
		{
		$Invoice = TableRegistry::getTableLocator()->get('Invoices');
		$invoice1=$Invoice->find("all",[
		"order"=>["Invoices.id"=>"desc"]])->where(['user_id' => $this->Auth->user('id')]);
		
	
		$this->set('invoice1', $invoice1);
		}
		else
		{
			return $this->redirect(['controller'=>'Home','action'=>'index']);
		}
   }
   public function mymocktest(){
	   
	    if($this->Auth->user('id'))
		{
		$userproduct = TableRegistry::getTableLocator()->get('UserProducts');
		$mytest=$userproduct->find("all",[
		"order"=>["UserProducts.id"=>"desc"]])->contain(['Products','Examinations','UserProductDetails','UserProductDetails.MockTests'])->where(['UserProducts.user_id' => $this->Auth->user('id')]);
		
	
		$this->set('mytest', $mytest);
		}
		else
		{
			return $this->redirect(['controller'=>'Home','action'=>'index']);
		}
		
   }
   
      public function myreport(){
		  
		if($this->Auth->user('id'))
		{  
		$userproduct = TableRegistry::getTableLocator()->get('UserExaminations');
		$mytest=$this->paginate($userproduct->find("all",[
		"order"=>["UserExaminations.id"=>"desc"]])->contain(['UserExaminationAnswers','Examinations','ExaminationCategories','MockTests'])->where(['UserExaminations.user_id' => $this->Auth->user('id'),'MockTests.is_demo'=>0]));

	
		$this->set('mytest', $mytest);
		}
		else
		{
			return $this->redirect(['controller'=>'Home','action'=>'index']);
		}
		
   }
   
    public function examdetails($id=null)
    {
		if($this->Auth->user('id'))
		{
        $tblUser = TableRegistry::getTableLocator()->get('UserExaminationAnswers');
		
        $examinations = $tblUser->find()->contain(['Questions','Questions.QuestionAnswers'])->where(['user_examination_id'=>$id]);
        
        //echo $examinations->first();

        $this->set(compact('examinations'));
        $this->set('_serialize', ['examinations']);
		
		}
		else
		{
			return $this->redirect(['controller'=>'Home','action'=>'index']);
		}
    }
   
  public function orderdetails($id){
	   
	  
	   
	   $Invoice = TableRegistry::getTableLocator()->get('Invoices');
		$invoice1=$Invoice->find("all")->contain(['UserDeliveryDetails','Users','Examinations'])->where(['Invoices.id' => $id])->first();
		
	
	
		$this->set('invoice', $invoice1);
	   
   }
public function privacy(){
       
      
		$branchObj = TableRegistry::getTableLocator()->get('StaticPages');
		$page=$branchObj->findBySlug('privacy-policy')->first();
		$this->_display_meta = TRUE;
		$this->setMeta($page);
		$this->set('page', $page);
	
}
public function terms(){
       
      
		$branchObj = TableRegistry::getTableLocator()->get('StaticPages');
		$page=$branchObj->findBySlug('terms-and-conditions')->first();
		$this->_display_meta = TRUE;
		$this->setMeta($page);
		$this->set('page', $page);
	
}
public function refund(){
		
		$branchObj = TableRegistry::getTableLocator()->get('StaticPages');
		$page=$branchObj->findBySlug('refund-policy')->first();
		$this->_display_meta = TRUE;
		$this->setMeta($page);
		$this->set('page', $page);
		
   }
   public function bankdetails($id=null){
		
		$InvoiceItems = TableRegistry::getTableLocator()->get('InvoiceItems');
        $invoice_items11 = $InvoiceItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice_items1 = $InvoiceItems->patchEntity($invoice_items11, $this->request->getData());

            if ($InvoiceItems->save($invoice_items1)) {
                $this->Flash->success(__('We have Received your Bank Details..'));

                return $this->redirect(["controller"=>"Home",'action' => 'myorders']);
            } else {
                $this->Flash->error(__('Your Bank Detail has not been Submitted. Please, try again.'));
            }
        }
		$this->set(compact('invoice_items11'));
        $this->set('_serialize', ['invoice_items11']);
		
   }
   public function ordercancell($id=null)
   {
       		$InvoiceItems = TableRegistry::getTableLocator()->get('InvoiceItems');
        $invoice_items = $InvoiceItems->get($id, [
            'contain' => ['Invoices','Invoices.Users']
        ]);
        
       
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice_items1 = $InvoiceItems->patchEntity($invoice_items, $this->request->getData());
            $invoice_items1->order_status=3;
            $invoice_items1->order_cancell_date=date('Y-m-d');
            
                //for products
                $Products = TableRegistry::getTableLocator()->get('Products');
                $Products1 = $Products->get($invoice_items->product_id);
		  		$product_qtn = $Products->patchEntity($Products1, $this->request->getData());
		  		$product_qtn->total_quantity=$Products1->total_quantity+$invoice_items->quantity;
		  		
                $product_qtn->total_quantity_sale=$Products1->total_quantity_sale-$invoice_items->quantity;
                $Products->save($product_qtn);
                
                //for user products
				

				$UserProducts = TableRegistry::getTableLocator()->get('UserProducts');
                $query = $UserProducts->query();
                $query->update()
                    ->set(['total_quantity' => $product_qtn->total_quantity,'total_quantity_sale'=>$product_qtn->total_quantity_sale])
                    ->where(['product_id' => $Products1->id])
                    ->execute();
            
            if ($InvoiceItems->save($invoice_items1)) {
                
                 //pr($invoice_items->invoice->user->mobile);die;
                
                 $this->loadComponent('SendMail');
          
                $msg = "We want to inform you that Purchased Order Number $invoice_items->invoice->order_id has been cancelled at your Febino Shopping Portal. Confirmed by Team-Febino.";
                $this->SendMail->sendOTP($msg, $invoice_items->invoice->user->mobile);
            
                $this->Flash->success(__('Your order has been Cancelled'));

                return $this->redirect(["controller"=>"Home",'action' => 'myorders']);
            } else {
                $this->Flash->error(__('Your order has not been Cancelled. Please, try again.'));
            }
        }
		$this->set(compact('invoice_items'));
        $this->set('_serialize', ['invoice_items']);
   }
    public function editreview($id = null){
        
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
		 $user1=$tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
		 $this->set('user1', $user1);
		$Reviews = TableRegistry::getTableLocator()->get('Reviews');
        $rev = $Reviews->get($id, [
            'contain' => ['ReviewImages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rev = $Reviews->patchEntity($rev, $this->request->getData());
            if ($r=$Reviews->save($rev)) {
                
                //review image
                $path = 'upload/Review/';
                    
                    foreach ($_FILES['product_image']['tmp_name'] as $key => $value) {

                        $file_tmpname = $_FILES['product_image']['tmp_name'][$key];
                        $file_name = $_FILES['product_image']['name'][$key];
                    
                          
                        if(!empty($file_name)) {
                            $fileName = time().$file_name;
                            $uploadPath = WWW_ROOT . $path;
                            $uploadFile = $uploadPath . $fileName;
            
                            if(move_uploaded_file($file_tmpname, $uploadFile)) {
                                // Create a new Entity over here for each uploaded image
                               $item = $Reviews->ReviewImages->newEmptyEntity();
                                $item->product_image = $fileName;
                                $item->review_id=$r->id;
                                $Reviews->ReviewImages->save($item);
                            } 
                                }
					
                    
			        
			        
			         
			         
			          
                    }
                
                $this->Flash->success(__('Your Review has been Edited'));

                return $this->redirect(["controller"=>"Home",'action' => 'myreviews']);
            } else {
                $this->Flash->error(__('Your Review has not been Edited. Please, try again.'));
            }
        }
		$this->set(compact('rev'));
        $this->set('_serialize', ['rev']);

   }
  public function editaddress($id = null){
      
      
        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
		 $user1=$tblUserObj1->find("all")->where(['id' => $this->Auth->user('id')])->first();
		 $this->set('user1', $user1);
	     
	     $user_delivery = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
		 $user2=$user_delivery->find("all")->where(['id' => $id])->first();
		 $this->set('user2', $user2);
		 $staticPage = $user_delivery->get($id, [
			'contain' => []
		]);
		

		
			 if ($this->request->is(['patch', 'post', 'put'])) {
			     	     
			$usersave = $user_delivery->patchEntity($staticPage, $this->request->getData());
			if ($user_delivery->save($usersave)) {
			   
				$this->Flash->success(__('Address is Successfully Updated.'));

				return $this->redirect(['action' => 'addressbook']);
			} else {
				$this->Flash->error(__('Address is not Successfully Updated.'));
			}
       
		}
		

   }
   public function deleteaddress($id = null){
		$address = TableRegistry::getTableLocator()->get('UserDeliveryDetails');
        $this->request->allowMethod(['post', 'delete']);
        $ad = $address->get($id);
        if ($address->delete($ad)) {
            $this->Flash->success(__('Address has been Deleted'));
        } else {
            $this->Flash->error(__('Address has not been Deleted. Please, try again.'));
        }

        return $this->redirect(["controller"=>"Home",'action' => 'addressbook']);
   }
      public function deletereview($id = null){
		$Reviews = TableRegistry::getTableLocator()->get('Reviews');
        $this->request->allowMethod(['post', 'delete']);
        $category = $Reviews->get($id);
        if ($Reviews->delete($category)) {
            $this->Flash->success(__('Review has been Deleted'));
        } else {
            $this->Flash->error(__('Review has not been Deleted. Please, try again.'));
        }

        return $this->redirect(["controller"=>"Home",'action' => 'myreviews']);
   }
    public function deletereviewimage($id = null){
		$Reviews = TableRegistry::getTableLocator()->get('ReviewImages');
        $this->request->allowMethod(['post', 'delete']);
        $category = $Reviews->get($id);
        if ($Reviews->delete($category)) {
            $this->Flash->success(__('Image has been Deleted'));
        } else {
            $this->Flash->error(__('Image has not been Deleted. Please, try again.'));
        }

        return $this->redirect(["controller"=>"Home",'action' => 'myreviews']);
   }
   public function changepassword(){
	        $tblUserObj1 = TableRegistry::getTableLocator()->get('Users');
			$staticPage = $tblUserObj1->get($this->Auth->user('id'), [
			'contain' => []
		   ]);
		   $this->set('user1', $staticPage);
			if ($this->request->is(['patch', 'post', 'put'])) {
				
			if($this->request->getData('password')==$this->request->getData('confirm_password'))
			{				
			$usersave = $tblUserObj1->patchEntity($staticPage, $this->request->getData());
			if ($tblUserObj1->save($usersave)) {
				$this->Flash->success(__('Password has been changed.'));

				return $this->redirect(['action' => 'changepassword']);
			} else {
				$this->Flash->error(__('Password has not been changed.'));
			}
			}
			else
			{
				$this->Flash->success(__('Password and Confirm password did not Match'));

				return $this->redirect(['action' => 'changepassword']);
			}
        }
   }
   
public function invoice($id)
{
			$Invoice = TableRegistry::getTableLocator()->get('Invoices');
            $invoice = $Invoice->get($id, [
            'contain' => ['Users','UserDeliveryDetails','InvoiceItems','InvoiceItems.Products','InvoiceItems.Examinations']
        ]);
        

       

$this->viewBuilder()->enableAutoLayout(false); 			

	
	$this->viewBuilder()
	
	->setClassName('CakePdf.Pdf')
    ->setLayout('pdf')
	->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'filename' => 'Invoice_' . $id. '.pdf',
            ]
        );
			
			$this->set(compact('invoice'));
			
}

   public function forgetpasswordwithotp() {
       //$this->autoRender = FALSE;
       $Users = TableRegistry::getTableLocator()->get('Users');
       if ($this->request->is('post')) {
           $email = $this->request->getData('email');
           if (!empty($email)) {
               $User = $Users->find('all')->where(['email' => $email,'is_customer' => 1]);

               if ($User->count() > 0) {
                   $row = $User->first();
                   
                   $uid = \Firebase\JWT\JWT::encode([
                               'sub' => $row->id,
                               'exp' => time() + 3600 * 10
                                   ], Security::salt());
                   $validation_url = \Cake\Routing\Router::url([
                               "controller" => "Home",
                               "action" => "resetpassword",
                               "?" => [
                                   'eid' => $uid
                               ],
                               'escape'=>FALSE
                                   ], true);
                                   

                   $this->loadComponent('SendMail');
                   $this->SendMail->sendMail(13, $this->request->data['email'], ['user_id' => $row->id, 'act_link' => $validation_url]);
                   echo "<script type='text/javascript'>alert('Please Check your Email.We have Sent you a Link to Change Password.');</script>";
                   
               } else {
                         echo "<script type='text/javascript'>alert('This Email ID is not Registered With Us.');</script>";
                 
               }
           } else {
               
           }
       } else {

         
       }
     
   }

    public function resetpassword()
    {
       $this->set('eid', $this->request->query('eid'));
       /// $user_id = \Firebase\JWT\JWT::decode($this->request->query('eid'), Security::salt(), ['HS256']);
        //pr($user_id);
      //  die;
        
    }
    
    public function shipping()
    {
       
        
    }
    
    
    
    public function testemail(){
         $this->loadComponent('SendMail');
             

                $this->SendMail->sendMail(5, "bideshbhunia@gmail.com", ['name' => "XXXC", 'email' => "bideshbhunia@gmail.com","otp_code"=>"6666666","message1"=>"test"]);
               $this->autoRender=false;
    }
}
