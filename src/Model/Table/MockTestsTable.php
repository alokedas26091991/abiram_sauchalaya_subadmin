<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MockTests Model
 *
 * @property \App\Model\Table\ExaminationCategoriesTable&\Cake\ORM\Association\BelongsTo $ExaminationCategories
 * @property \App\Model\Table\ExaminationsTable&\Cake\ORM\Association\BelongsTo $Examinations
 * @property \App\Model\Table\ExaminationQuestionsTable&\Cake\ORM\Association\HasMany $ExaminationQuestions
 *
 * @method \App\Model\Entity\MockTest newEmptyEntity()
 * @method \App\Model\Entity\MockTest newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MockTest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MockTest get($primaryKey, $options = [])
 * @method \App\Model\Entity\MockTest findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MockTest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MockTest[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MockTest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MockTest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MockTest[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MockTest[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MockTest[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MockTest[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MockTestsTable extends Table
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

        $this->setTable('mock_tests');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        
        $this->belongsTo('Examinations', [
            'foreignKey' => 'examination_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ExaminationMockTestQuestions', [
            'foreignKey' => 'mock_test_id',
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
        
        $rules->add($rules->existsIn('examination_id', 'Examinations'), ['errorField' => 'examination_id']);

        return $rules;
    }
}
