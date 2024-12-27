<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserProductDetails Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UserProductsTable&\Cake\ORM\Association\BelongsTo $UserProducts
 * @property \App\Model\Table\ExaminationsTable&\Cake\ORM\Association\BelongsTo $Examinations
 * @property \App\Model\Table\MockTestsTable&\Cake\ORM\Association\BelongsTo $MockTests
 *
 * @method \App\Model\Entity\UserProductDetail newEmptyEntity()
 * @method \App\Model\Entity\UserProductDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserProductDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserProductDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserProductDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserProductDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserProductDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserProductDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProductDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProductDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProductDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProductDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProductDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserProductDetailsTable extends Table
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

        $this->setTable('user_product_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('UserProducts', [
            'foreignKey' => 'user_product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Examinations', [
            'foreignKey' => 'examination_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MockTests', [
            'foreignKey' => 'mock_test_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('user_product_id')
            ->notEmptyString('user_product_id');

        $validator
            ->integer('examination_id')
            ->notEmptyString('examination_id');

        $validator
            ->integer('mock_test_id')
            ->notEmptyString('mock_test_id');

        

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('user_product_id', 'UserProducts'), ['errorField' => 'user_product_id']);
        $rules->add($rules->existsIn('examination_id', 'Examinations'), ['errorField' => 'examination_id']);
        $rules->add($rules->existsIn('mock_test_id', 'MockTests'), ['errorField' => 'mock_test_id']);

        return $rules;
    }
}
