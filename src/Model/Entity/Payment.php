<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $bookings_id
 * @property int $user_type
 * @property int $user_id
 * @property float $paid_amount
 * @property \Cake\I18n\FrozenDate $payment_date
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenDate $created_at
 * @property \Cake\I18n\FrozenDate $updated_at
 *
 * @property \App\Model\Entity\Booking $booking
 * @property \App\Model\Entity\User $user
 */
class Payment extends Entity
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
        'bookings_id' => true,
 
   
     
        'payment_date' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
        'booking' => true,
        'user' => true,
    ];
}
