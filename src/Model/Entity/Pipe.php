<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pipe Entity
 *
 * @property int $id
 * @property string $name
 * @property string $amount
 * @property bool $is_active
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenDate $created_at
 * @property \Cake\I18n\FrozenDate $updated_at
 */
class Pipe extends Entity
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
        'amount' => true,
        'is_active' => true,
        'is_deleted' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
