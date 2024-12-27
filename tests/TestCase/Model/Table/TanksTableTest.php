<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TanksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TanksTable Test Case
 */
class TanksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TanksTable
     */
    protected $Tanks;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tanks',
        'app.Bookings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tanks') ? [] : ['className' => TanksTable::class];
        $this->Tanks = $this->getTableLocator()->get('Tanks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tanks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TanksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
