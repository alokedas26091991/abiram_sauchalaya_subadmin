<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostOfficesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostOfficesTable Test Case
 */
class PostOfficesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PostOfficesTable
     */
    protected $PostOffices;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PostOffices',
        'app.States',
        'app.Districts',
        'app.Areas',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PostOffices') ? [] : ['className' => PostOfficesTable::class];
        $this->PostOffices = $this->getTableLocator()->get('PostOffices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PostOffices);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PostOfficesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PostOfficesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
