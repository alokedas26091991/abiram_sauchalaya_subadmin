<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminationMockTestQuestions Model
 *
 * @property \App\Model\Table\MockTestsTable&\Cake\ORM\Association\BelongsTo $MockTests
 * @property \App\Model\Table\ExaminationCategoriesTable&\Cake\ORM\Association\BelongsTo $ExaminationCategories
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\ExaminationsTable&\Cake\ORM\Association\BelongsTo $Examinations
 *
 * @method \App\Model\Entity\ExaminationMockTestQuestion newEmptyEntity()
 * @method \App\Model\Entity\ExaminationMockTestQuestion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationMockTestQuestion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExaminationMockTestQuestionsTable extends Table
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

        $this->setTable('examination_mock_test_questions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MockTests', [
            'foreignKey' => 'mock_test_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ExaminationCategories', [
            'foreignKey' => 'examination_category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Examinations', [
            'foreignKey' => 'examination_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('UserExaminationAnswers', [
            'foreignKey' => 'examination_mock_test_question_id',
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
            ->integer('mock_test_id')
            ->notEmptyString('mock_test_id');

        $validator
            ->integer('examination_category_id')
            ->notEmptyString('examination_category_id');

        $validator
            ->integer('question_id')
            ->notEmptyString('question_id');

        $validator
            ->integer('examination_id')
            ->notEmptyString('examination_id');

        

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
        $rules->add($rules->existsIn('mock_test_id', 'MockTests'), ['errorField' => 'mock_test_id']);
        $rules->add($rules->existsIn('examination_category_id', 'ExaminationCategories'), ['errorField' => 'examination_category_id']);
        $rules->add($rules->existsIn('question_id', 'Questions'), ['errorField' => 'question_id']);
        $rules->add($rules->existsIn('examination_id', 'Examinations'), ['errorField' => 'examination_id']);

        return $rules;
    }
}
