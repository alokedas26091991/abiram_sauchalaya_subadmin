<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Areas Model
 *
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\DistrictsTable&\Cake\ORM\Association\BelongsTo $Districts
 * @property \App\Model\Table\PostOfficesTable&\Cake\ORM\Association\HasMany $PostOffices
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Area newEmptyEntity()
 * @method \App\Model\Entity\Area newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Area[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Area get($primaryKey, $options = [])
 * @method \App\Model\Entity\Area findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Area patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Area[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Area|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Area saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Area[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Area[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Area[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Area[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AreasTable extends Table
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

        $this->setTable('areas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Districts', [
            'foreignKey' => 'district_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PostOffices', [
            'foreignKey' => 'area_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'area_id',
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
            ->integer('state_id')
            ->notEmptyString('state_id');

        $validator
            ->integer('district_id')
            ->notEmptyString('district_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
            ->date('updated_at')
            ->requirePresence('updated_at', 'create')
            ->notEmptyDate('updated_at');

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

        return $rules;
    }
}
