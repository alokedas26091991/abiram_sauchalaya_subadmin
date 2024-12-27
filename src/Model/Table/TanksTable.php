<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tanks Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 *
 * @method \App\Model\Entity\Tank newEmptyEntity()
 * @method \App\Model\Entity\Tank newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tank get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tank findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tank[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tank[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tank[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tank[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tank[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TanksTable extends Table
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

        $this->setTable('tanks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
            'foreignKey' => 'tank_id',
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

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->boolean('is_active')
            ->notEmptyString('is_active');

        $validator
            ->boolean('is_deleted')
            ->notEmptyString('is_deleted');

        $validator
            ->date('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmptyDate('created_at');

        $validator
            ->integer('updated_at')
            ->requirePresence('updated_at', 'create')
            ->notEmptyString('updated_at');

        return $validator;
    }
}
