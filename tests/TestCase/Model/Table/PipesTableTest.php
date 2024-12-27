<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PipesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PipesTable Test Case
 */
class PipesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PipesTable
     */
    protected $Pipes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Pipes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pipes') ? [] : ['className' => PipesTable::class];
        $this->Pipes = $this->getTableLocator()->get('Pipes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pipes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PipesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
