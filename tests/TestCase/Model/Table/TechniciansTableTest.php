<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TechniciansTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TechniciansTable Test Case
 */
class TechniciansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TechniciansTable
     */
    protected $Technicians;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Technicians',
        'app.Exams',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Technicians') ? [] : ['className' => TechniciansTable::class];
        $this->Technicians = $this->getTableLocator()->get('Technicians', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Technicians);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TechniciansTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TechniciansTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
