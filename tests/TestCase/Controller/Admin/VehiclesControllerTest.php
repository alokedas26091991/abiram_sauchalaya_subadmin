<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\VehiclesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Admin\VehiclesController Test Case
 *
 * @uses \App\Controller\Admin\VehiclesController
 */
class VehiclesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Vehicles',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Admin\VehiclesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Admin\VehiclesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Admin\VehiclesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Admin\VehiclesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Admin\VehiclesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
