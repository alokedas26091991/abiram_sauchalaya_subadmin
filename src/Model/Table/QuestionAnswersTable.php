<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionAnswers Model
 *
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 *
 * @method \App\Model\Entity\QuestionAnswer newEmptyEntity()
 * @method \App\Model\Entity\QuestionAnswer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionAnswer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionAnswer get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuestionAnswer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QuestionAnswer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionAnswer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionAnswer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionAnswer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionAnswer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuestionAnswer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuestionAnswer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuestionAnswer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuestionAnswersTable extends Table
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

        $this->setTable('question_answers');
        $this->setDisplayField('q_option');
        $this->setPrimaryKey('id');

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
            ->integer('question_id')
            ->notEmptyString('question_id');

        $validator
            ->scalar('q_option')
            ->maxLength('q_option', 512)
            ->requirePresence('q_option', 'create')
            ->notEmptyString('q_option');

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
        $rules->add($rules->existsIn('question_id', 'Questions'), ['errorField' => 'question_id']);

        return $rules;
    }
}
