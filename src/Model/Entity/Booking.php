<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string|null $last_name
 * @property string $address
 * @property string $contact_no
 * @property string $whatsapp_no
 * @property int $state_id
 * @property int $district_id
 * @property int $area_id
 * @property int $post_office_id
 * @property int $pincode
 * @property int $chamber_id
 * @property int $tank_id
 * @property int $pipe_id
 * @property float $amount
 * @property \Cake\I18n\FrozenDate|null $work_date
 * @property \Cake\I18n\Time|null $work_time
 * @property int|null $vehicle_no
 * @property int|null $driver
 * @property int|null $helper1
 * @property int|null $helper2
 * @property string|null $remarks
 * @property int $status
 * @property float|null $payment_amount
 * @property \Cake\I18n\FrozenDate|null $payment_date
 * @property string|null $payment_note
 * @property string|null $payment_receive_by
 * @property int|null $payment_receive_by_id
 * @property \Cake\I18n\FrozenDate $created_at
 * @property \Cake\I18n\FrozenDate $updated_at
 * @property \Cake\I18n\FrozenDate $entry_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\Area $area
 * @property \App\Model\Entity\PostOffice $post_office
 * @property \App\Model\Entity\Chamber $chamber
 * @property \App\Model\Entity\Tank $tank
 * @property \App\Model\Entity\Pipe $pipe
 */
class Booking extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'address' => true,
        'contact_no' => true,
        'whatsapp_no' => true,
        'state_id' => true,
        'district_id' => true,
        'area_id' => true,
        'post_office_id' => true,
        'pincode' => true,
        'chamber_id' => true,
        'tank_id' => true,
        'pipe_id' => true,
        'amount' => true,
        
        'status' => true,
       
        'created_at' => true,
        'updated_at' => true,
        'entry_date' => true,
        'is_deleted' => true,
      
        
    ];
}
