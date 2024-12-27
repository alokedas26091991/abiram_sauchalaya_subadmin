<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceItem Entity
 *
 * @property int $id
 * @property int $invoice_id
 * @property float $gross_amount
 * @property float $net_amount
 * @property float $discount
 * @property float $tax_amount
 * @property int $product_id
 * @property int $examination_id
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Examination $examination
 */
class InvoiceItem extends Entity
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
        'invoice_id' => true,
        'gross_amount' => true,
        'net_amount' => true,
        'discount' => true,
        'tax_amount' => true,
        'product_id' => true,
        'examination_id' => true,
        'create_date' => true,
        'is_deleted' => true,
        'invoice' => true,
        'product' => true,
        'examination' => true,
    ];
}
