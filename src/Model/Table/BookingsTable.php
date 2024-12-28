<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\DistrictsTable&\Cake\ORM\Association\BelongsTo $Districts
 * @property \App\Model\Table\AreasTable&\Cake\ORM\Association\BelongsTo $Areas
 * @property \App\Model\Table\PostOfficesTable&\Cake\ORM\Association\BelongsTo $PostOffices
 * @property \App\Model\Table\ChambersTable&\Cake\ORM\Association\BelongsTo $Chambers
 * @property \App\Model\Table\TanksTable&\Cake\ORM\Association\BelongsTo $Tanks
 * @property \App\Model\Table\PipesTable&\Cake\ORM\Association\BelongsTo $Pipes
 *
 * @method \App\Model\Entity\Booking newEmptyEntity()
 * @method \App\Model\Entity\Booking newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BookingsTable extends Table
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

        $this->setTable('bookings');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        
		
		$this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'propertyName' => 'user', // Alias for manager data
        ]);

        // Relationship for supervisor
        $this->belongsTo('Drivers', [
            'className' => 'Users',
            'foreignKey' => 'driver',
            'propertyName' => 'driver', // Alias for supervisor data
        ]);
		
		
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PostOffices', [
            'foreignKey' => 'post_office_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Chambers', [
            'foreignKey' => 'chamber_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tanks', [
            'foreignKey' => 'tank_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Pipes', [
            'foreignKey' => 'pipe_id',
            'joinType' => 'INNER',
        ]);
		$this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('contact_no')
            ->maxLength('contact_no', 255)
            ->requirePresence('contact_no', 'create')
            ->notEmptyString('contact_no');

        $validator
            ->scalar('whatsapp_no')
            ->maxLength('whatsapp_no', 255)
            ->requirePresence('whatsapp_no', 'create')
            ->notEmptyString('whatsapp_no');

        $validator
            ->integer('state_id')
            ->notEmptyString('state_id');

        $validator
            ->integer('district_id')
            ->notEmptyString('district_id');

        $validator
            ->integer('area_id')
            ->notEmptyString('area_id');

        $validator
            ->integer('post_office_id')
            ->notEmptyString('post_office_id');

        $validator
            ->integer('pincode')
            ->requirePresence('pincode', 'create')
            ->notEmptyString('pincode');

        $validator
            ->integer('chamber_id')
            ->notEmptyString('chamber_id');

        $validator
            ->integer('tank_id')
            ->notEmptyString('tank_id');

        $validator
            ->integer('pipe_id')
            ->notEmptyString('pipe_id');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');





        $validator
            ->integer('status')
            ->notEmptyString('status');



        $validator
            ->date('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmptyDate('created_at');

        $validator
            ->date('updated_at')
            ->requirePresence('updated_at', 'create')
            ->notEmptyDate('updated_at');

        $validator
            ->date('entry_date')
            ->requirePresence('entry_date', 'create')
            ->notEmptyDate('entry_date');

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

        $rules->add($rules->existsIn('state_id', 'States'), ['errorField' => 'state_id']);
        $rules->add($rules->existsIn('district_id', 'Districts'), ['errorField' => 'district_id']);
        $rules->add($rules->existsIn('area_id', 'Areas'), ['errorField' => 'area_id']);
        $rules->add($rules->existsIn('post_office_id', 'PostOffices'), ['errorField' => 'post_office_id']);
        $rules->add($rules->existsIn('chamber_id', 'Chambers'), ['errorField' => 'chamber_id']);
        $rules->add($rules->existsIn('tank_id', 'Tanks'), ['errorField' => 'tank_id']);
        $rules->add($rules->existsIn('pipe_id', 'Pipes'), ['errorField' => 'pipe_id']);
		$rules->add($rules->existsIn('vehicle_id', 'Vehicles'), ['errorField' => 'vehicle_id']);

        return $rules;
    }
}
