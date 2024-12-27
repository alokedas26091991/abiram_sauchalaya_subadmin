<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSubscription Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $subscription_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property \Cake\I18n\FrozenDate $create_date
 * @property bool $is_active
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Subscription $subscription
 */
class UserSubscription extends Entity
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
        'subscription_id' => true,
        'start_date' => true,
        'end_date' => true,
        'create_date' => true,
        'is_active' => true,
        'is_deleted' => true,
        'user' => true,
        'subscription' => true,
    ];
}
