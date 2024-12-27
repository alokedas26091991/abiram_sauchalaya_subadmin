<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserProductDetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_product_id
 * @property int $examination_id
 * @property int $mock_test_id
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\UserProduct $user_product
 * @property \App\Model\Entity\Examination $examination
 * @property \App\Model\Entity\MockTest $mock_test
 */
class UserProductDetail extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'user_product_id' => true,
        'examination_id' => true,
        'mock_test_id' => true,
        'create_date' => true,
        'is_deleted' => true,
        'user' => true,
        'user_product' => true,
        'examination' => true,
        'mock_test' => true,
    ];
}
