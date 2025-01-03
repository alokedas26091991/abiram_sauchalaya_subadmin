<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wishlists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Vendors
 * @property \Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\Wishlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Wishlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Wishlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wishlist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Wishlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Wishlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wishlist findOrCreate($search, callable $callback = null)
 */
class ReviewsTable extends Table
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

        $this->setTable('reviews');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);	
		
		$this->belongsTo('Examinations', [
            'foreignKey' => 'examination_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */

}
