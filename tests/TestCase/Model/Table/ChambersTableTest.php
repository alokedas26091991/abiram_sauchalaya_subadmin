<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChambersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChambersTable Test Case
 */
class ChambersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChambersTable
     */
    protected $Chambers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Chambers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Chambers') ? [] : ['className' => ChambersTable::class];
        $this->Chambers = $this->getTableLocator()->get('Chambers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Chambers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ChambersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
