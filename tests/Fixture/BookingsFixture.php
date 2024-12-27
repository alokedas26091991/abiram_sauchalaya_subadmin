<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFixture
 */
class BookingsFixture extends TestFixture
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
                'user_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'contact_no' => 'Lorem ipsum dolor sit amet',
                'whatsapp_no' => 'Lorem ipsum dolor sit amet',
                'state_id' => 1,
                'district_id' => 1,
                'area_id' => 1,
                'post_office_id' => 1,
                'pincode' => 1,
                'chamber_id' => 1,
                'tank_id' => 1,
                'pipe_id' => 1,
                'amount' => 1,
                'work_date' => '2024-12-24',
                'work_time' => '11:04:29',
                'vehicle_no' => 1,
                'driver' => 1,
                'helper1' => 1,
                'helper2' => 1,
                'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 1,
                'payment_amount' => 1,
                'payment_date' => '2024-12-24',
                'payment_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'payment_receive_by' => 'Lorem ipsum dolor sit amet',
                'payment_receive_by_id' => 1,
                'created_at' => '2024-12-24',
                'updated_at' => '2024-12-24',
                'entry_date' => '2024-12-24',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
