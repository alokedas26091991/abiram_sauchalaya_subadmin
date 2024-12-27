<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DistrictsFixture
 */
class DistrictsFixture extends TestFixture
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
                'state_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'is_active' => 1,
                'is_deleted' => 1,
                'created_at' => '2024-12-24',
                'updated_at' => '2024-12-24',
            ],
        ];
        parent::init();
    }
}
