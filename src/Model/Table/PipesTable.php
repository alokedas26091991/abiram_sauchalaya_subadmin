<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pipes Model
 *
 * @method \App\Model\Entity\Pipe newEmptyEntity()
 * @method \App\Model\Entity\Pipe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pipe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pipe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pipe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pipe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pipe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pipe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pipe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pipe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pipe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pipe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pipe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PipesTable extends Table
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

        $this->setTable('pipes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('amount')
            ->maxLength('amount', 255)
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
            ->date('updated_at')
            ->requirePresence('updated_at', 'create')
            ->notEmptyDate('updated_at');

        return $validator;
    }
}
