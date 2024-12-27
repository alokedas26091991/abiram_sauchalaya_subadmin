<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CartItemsFixture
 */
class CartItemsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'cart_id' => 1,
                'gross_amount' => 1,
                'net_amount' => 1,
                'discount' => 1,
                'tax_amount' => 1,
                'product_id' => 1,
                'examination_id' => 1,
                'create_date' => '2024-05-12 12:16:42',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}