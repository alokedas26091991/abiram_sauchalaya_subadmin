<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminationQuestions Model
 *
 * @property \App\Model\Table\ExaminationCategoriesTable&\Cake\ORM\Association\BelongsTo $ExaminationCategories
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\ExaminationsTable&\Cake\ORM\Association\BelongsTo $Examinations
 *
 * @method \App\Model\Entity\ExaminationQuestion newEmptyEntity()
 * @method \App\Model\Entity\ExaminationQuestion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExaminationQuestion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ExaminationQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationQuestion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationQuestion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminationQuestion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminationQuestion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationQuestion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationQuestion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationQuestion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExaminationQuestionsTable extends Table
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

        $this->setTable('examination_questions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->integer('examination_category_id')
            ->notEmptyString('examination_category_id');

        $validator
            ->integer('question_id')
            ->notEmptyString('question_id');

        $validator
            ->integer('examination_id')
            ->notEmptyString('examination_id');

        $validator
            ->dateTime('create_date')
            ->requirePresence('create_date', 'create')
            ->notEmptyDateTime('create_date');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmptyString('created_by');

        

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
        $rules->add($rules->existsIn('examination_category_id', 'ExaminationCategories'), ['errorField' => 'examination_category_id']);
        $rules->add($rules->existsIn('question_id', 'Questions'), ['errorField' => 'question_id']);
        $rules->add($rules->existsIn('examination_id', 'Examinations'), ['errorField' => 'examination_id']);

        return $rules;
    }
}
