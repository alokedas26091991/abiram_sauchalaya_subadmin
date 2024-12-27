<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CartItems Model
 *
 * @property \App\Model\Table\CartsTable&\Cake\ORM\Association\BelongsTo $Carts
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\ExaminationsTable&\Cake\ORM\Association\BelongsTo $Examinations
 *
 * @method \App\Model\Entity\CartItem newEmptyEntity()
 * @method \App\Model\Entity\CartItem newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CartItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CartItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\CartItem findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CartItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CartItem[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CartItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CartItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CartItem[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CartItem[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CartItem[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CartItem[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CartItemsTable extends Table
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

        $this->setTable('cart_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Carts', [
            'foreignKey' => 'cart_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
            ->integer('cart_id')
            ->notEmptyString('cart_id');

        $validator
            ->numeric('gross_amount')
            ->requirePresence('gross_amount', 'create')
            ->notEmptyString('gross_amount');

        $validator
            ->numeric('net_amount')
            ->requirePresence('net_amount', 'create')
            ->notEmptyString('net_amount');

        $validator
            ->numeric('discount')
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->numeric('tax_amount')
            ->requirePresence('tax_amount', 'create')
            ->notEmptyString('tax_amount');

        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

        $validator
            ->integer('examination_id')
            ->notEmptyString('examination_id');

        $validator
            ->dateTime('create_date')
            ->requirePresence('create_date', 'create')
            ->notEmptyDateTime('create_date');

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
        $rules->add($rules->existsIn('cart_id', 'Carts'), ['errorField' => 'cart_id']);
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn('examination_id', 'Examinations'), ['errorField' => 'examination_id']);

        return $rules;
    }
}
