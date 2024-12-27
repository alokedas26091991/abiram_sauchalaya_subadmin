<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserProducts Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\UserProductDetailsTable&\Cake\ORM\Association\HasMany $UserProductDetails
 *
 * @method \App\Model\Entity\UserProduct newEmptyEntity()
 * @method \App\Model\Entity\UserProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserProductsTable extends Table
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

        $this->setTable('user_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
		$this->belongsTo('Examinations', [
            'foreignKey' => 'exam_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('UserProductDetails', [
            'foreignKey' => 'user_product_id',
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
            ->integer('invoice_id')
            ->notEmptyString('invoice_id');

        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

        $validator
            ->integer('exam_id')
            ->allowEmptyString('exam_id');

        $validator
            ->date('start_date')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->notEmptyDate('end_date');

        $validator
            ->dateTime('create_date')
            ->requirePresence('create_date', 'create')
            ->notEmptyDateTime('create_date');

       

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
        $rules->add($rules->existsIn('invoice_id', 'Invoices'), ['errorField' => 'invoice_id']);
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
