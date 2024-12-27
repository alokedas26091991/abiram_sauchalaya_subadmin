<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examinations Model
 *
 * @property \App\Model\Table\ExaminationCategoriesTable&\Cake\ORM\Association\BelongsTo $ExaminationCategories
 * @property \App\Model\Table\ExaminationQuestionsTable&\Cake\ORM\Association\HasMany $ExaminationQuestions
 * @property \App\Model\Table\MockTestsTable&\Cake\ORM\Association\HasMany $MockTests
 * @property \App\Model\Table\UserExaminationsTable&\Cake\ORM\Association\HasMany $UserExaminations
 *
 * @method \App\Model\Entity\Examination newEmptyEntity()
 * @method \App\Model\Entity\Examination newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Examination[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Examination get($primaryKey, $options = [])
 * @method \App\Model\Entity\Examination findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Examination patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Examination[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Examination|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examination saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examination[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Examination[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Examination[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Examination[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExaminationsTable extends Table
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

        $this->setTable('examinations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExaminationCategories', [
            'foreignKey' => 'examination_category_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ExaminationQuestions', [
            'foreignKey' => 'examination_id',
        ]);
        $this->hasMany('ExaminationMockTestQuestions', [
            'foreignKey' => 'examination_id',
        ]);
        $this->hasMany('MockTests', [
            'foreignKey' => 'examination_id',
        ]);
        $this->hasMany('UserExaminations', [
            'foreignKey' => 'examination_id',
        ]);
		$this->hasMany('Reviews', [
            'foreignKey' => 'examination_id',
        ]);
        $this->addBehavior('Muffin/Slug.Slug', [
       'displayField'=>'name',
	   'Model.beforeSave' => 'beforeSave'
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
            ->scalar('name')
            ->maxLength('name', 512)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        

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

        return $rules;
    }
}
