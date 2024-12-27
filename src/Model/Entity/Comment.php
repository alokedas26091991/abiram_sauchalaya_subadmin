<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property int $post_id
 * @property string $slug
 * @property string $post_name
 * @property string $name
 * @property string $email
 * @property string $message
 * @property \Cake\I18n\FrozenDate $message_date
 * @property string $admin_reply
 * @property \Cake\I18n\FrozenDate $admin_reply_date
 * @property \Cake\I18n\FrozenDate $created_date
 * @property bool $is_active
 * @property bool $is_deleted
 */
class Comment extends Entity
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
        'post_id' => true,
        'slug' => true,
        'post_name' => true,
        'name' => true,
        'email' => true,
        'message' => true,
        'message_date' => true,
        'admin_reply' => true,
        'admin_reply_date' => true,
        'created_date' => true,
        'is_active' => true,
        'is_deleted' => true,
    ];
}
