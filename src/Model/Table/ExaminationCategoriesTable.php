<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExaminationCategories Model
 *
 * @property \App\Model\Table\ExaminationCategoriesTable&\Cake\ORM\Association\BelongsTo $ParentExaminationCategories
 * @property \App\Model\Table\ExaminationCategoriesTable&\Cake\ORM\Association\HasMany $ChildExaminationCategories
 * @property \App\Model\Table\ExaminationQuestionsTable&\Cake\ORM\Association\HasMany $ExaminationQuestions
 * @property \App\Model\Table\ExaminationsTable&\Cake\ORM\Association\HasMany $Examinations
 * @property \App\Model\Table\MockTestsTable&\Cake\ORM\Association\HasMany $MockTests
 *
 * @method \App\Model\Entity\ExaminationCategory newEmptyEntity()
 * @method \App\Model\Entity\ExaminationCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExaminationCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ExaminationCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExaminationCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminationCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExaminationCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExaminationCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExaminationCategoriesTable extends Table
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

        $this->setTable('examination_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentExaminationCategories', [
            'className' => 'ExaminationCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildExaminationCategories', [
            'className' => 'ExaminationCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ExaminationQuestions', [
            'foreignKey' => 'examination_category_id',
        ]);
        $this->hasMany('Examinations', [
            'foreignKey' => 'examination_category_id',
        ]);
        $this->hasMany('MockTests', [
            'foreignKey' => 'examination_category_id',
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
            ->maxLength('name', 255)
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
        $rules->add($rules->existsIn('parent_id', 'ParentExaminationCategories'), ['errorField' => 'parent_id']);

        return $rules;
    }
}
