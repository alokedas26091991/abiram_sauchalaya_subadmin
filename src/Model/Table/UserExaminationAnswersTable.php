<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserExaminationAnswers Model
 *
 * @property \App\Model\Table\UserExaminationsTable&\Cake\ORM\Association\BelongsTo $UserExaminations
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 *
 * @method \App\Model\Entity\UserExaminationAnswer newEmptyEntity()
 * @method \App\Model\Entity\UserExaminationAnswer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserExaminationAnswer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserExaminationAnswersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('user_examination_answers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('UserExaminations', [
            'foreignKey' => 'user_examination_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ExaminationMockTestQuestions', [
            'foreignKey' => 'examination_mock_test_question_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_examination_id')
            ->notEmptyString('user_examination_id');

        $validator
            ->integer('examination_mock_test_question_id')
            ->notEmptyString('examination_mock_test_question_id');

        $validator
            ->integer('question_id')
            ->notEmptyString('question_id');

        $validator
            ->integer('answer_id')
            ->requirePresence('answer_id', 'create')
            ->notEmptyString('answer_id');

        $validator
            ->boolean('is_correct')
            ->notEmptyString('is_correct');

        $validator
            ->boolean('is_deleted')
            ->notEmptyString('is_deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_examination_id', 'UserExaminations'), ['errorField' => 'user_examination_id']);
        $rules->add($rules->existsIn('examination_mock_test_question_id', 'ExaminationMockTestQuestions'), ['errorField' => 'examination_mock_test_question_id']);
        $rules->add($rules->existsIn('question_id', 'Questions'), ['errorField' => 'question_id']);

        return $rules;
    }
}
