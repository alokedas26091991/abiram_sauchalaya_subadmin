<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $invoice_no
 * @property string $txn_id
 * @property float $gross_amount
 * @property float $net_amount
 * @property float $tax_amount
 * @property float $discount_amount
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Examination $examination
 * @property \App\Model\Entity\UserDeliveryDetail $user_delivery_detail
 */
class Invoice extends Entity
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
        'invoice_no' => true,
        'txn_id' => true,
        'order_no' => true,
        'gross_amount' => true,
        'net_amount' => true,
        'tax_amount' => true,
        'discount_amount' => true,
        "user_delivery_detail_id" => true,
        'is_active' => true,
        'create_date' => true,
        'is_deleted' => true,
        'user' => true,
        'examination' => true,
        'user_delivery_detail' => true,
    ];
}
