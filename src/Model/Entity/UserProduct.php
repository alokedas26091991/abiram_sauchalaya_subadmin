<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserProduct Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $invoice_id
 * @property int $product_id
 * @property int|null $exam_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property \Cake\I18n\FrozenTime $create_date
 * @property int $created_by
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Examination $examination
 * @property \App\Model\Entity\UserProductDetail[] $user_product_details
 */
class UserProduct extends Entity
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
        'invoice_id' => true,
        'product_id' => true,
        'exam_id' => true,
        'start_date' => true,
        'end_date' => true,
        'create_date' => true,
        'created_by' => true,
        'is_deleted' => true,
        'user' => true,
        'product' => true,
        'examination' => true,
        'user_product_details' => true,
    ];
}
