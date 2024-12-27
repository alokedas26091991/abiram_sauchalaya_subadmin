<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subscription Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $slug
 * @property int $duration
 * @property float $price
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\UserSubscription[] $user_subscriptions
 */
class Subscription extends Entity
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
        'name' => true,
        'description' => true,
        'slug' => true,
        'duration' => true,
        'price' => true,
        'is_active' => true,
        'create_date' => true,
        'is_deleted' => true,
        'carts' => true,
        'invoices' => true,
        'user_subscriptions' => true,
    ];
}
