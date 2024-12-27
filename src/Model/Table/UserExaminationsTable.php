<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserExaminations Model
 *
 * @property \App\Model\Table\ExaminationsTable&\Cake\ORM\Association\BelongsTo $Examinations
 * @property \App\Model\Table\ExaminationCategoriesTable&\Cake\ORM\Association\BelongsTo $ExaminationCategories
 * @property \App\Model\Table\MockTestsTable&\Cake\ORM\Association\BelongsTo $MockTests
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UserExaminationAnswersTable&\Cake\ORM\Association\HasMany $UserExaminationAnswers
 *
 * @method \App\Model\Entity\UserExamination newEmptyEntity()
 * @method \App\Model\Entity\UserExamination newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserExamination[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserExamination get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserExamination findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserExamination patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserExamination[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserExamination|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserExamination saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserExamination[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserExamination[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserExamination[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserExamination[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserExaminationsTable extends Table
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

        $this->setTable('user_examinations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Examinations', [
            'foreignKey' => 'examination_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ExaminationCategories', [
            'foreignKey' => 'examination_category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MockTests', [
            'foreignKey' => 'mock_test_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('UserExaminationAnswers', [
            'foreignKey' => 'user_examination_id',
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
            ->integer('examination_id')
            ->notEmptyString('examination_id');

        $validator
            ->integer('examination_category_id')
            ->notEmptyString('examination_category_id');

        $validator
            ->integer('mock_test_id')
            ->notEmptyString('mock_test_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('time_taken')
            ->requirePresence('time_taken', 'create')
            ->notEmptyString('time_taken');

        $validator
            ->numeric('marks_obtained')
            ->requirePresence('marks_obtained', 'create')
            ->notEmptyString('marks_obtained');

        $validator
            ->dateTime('attempt_date')
            ->requirePresence('attempt_date', 'create')
            ->notEmptyDateTime('attempt_date');

        $validator
            ->boolean('is_last_attempted')
            ->notEmptyString('is_last_attempted');

        $validator
            ->integer('last_attempted_question_id')
            ->requirePresence('last_attempted_question_id', 'create')
            ->notEmptyString('last_attempted_question_id');

        $validator
            ->boolean('is_start')
            ->notEmptyString('is_start');

        $validator
            ->boolean('is_completed')
            ->allowEmptyString('is_completed');

        $validator
            ->boolean('is_allow')
            ->notEmptyString('is_allow');

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
        $rules->add($rules->existsIn('examination_id', 'Examinations'), ['errorField' => 'examination_id']);
        $rules->add($rules->existsIn('examination_category_id', 'ExaminationCategories'), ['errorField' => 'examination_category_id']);
        $rules->add($rules->existsIn('mock_test_id', 'MockTests'), ['errorField' => 'mock_test_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
