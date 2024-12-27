<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Area Entity
 *
 * @property int $id
 * @property int $state_id
 * @property int $district_id
 * @property string $name
 * @property bool $is_active
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenDate $created_at
 * @property \Cake\I18n\FrozenDate $updated_at
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\PostOffice[] $post_offices
 * @property \App\Model\Entity\User[] $users
 */
class Area extends Entity
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
        'state_id' => true,
        'district_id' => true,
        'name' => true,
        'is_active' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
        'state' => true,
        'district' => true,
        'post_offices' => true,
        'users' => true,
    ];
}
