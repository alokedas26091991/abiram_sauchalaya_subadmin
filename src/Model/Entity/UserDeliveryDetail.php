<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserDeliveryDetail Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $company
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $country
 * @property string|null $state
 * @property string|null $city
 * @property int|null $pin
 * @property \Cake\I18n\FrozenDate|null $create_date
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\User $user
 */
class UserDeliveryDetail extends Entity
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
        '*' => true,
        'id' => false
    ];
}
