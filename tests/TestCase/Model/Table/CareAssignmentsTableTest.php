<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CareAssignmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CareAssignmentsTable Test Case
 */
class CareAssignmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CareAssignmentsTable
     */
    protected $CareAssignments;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CareAssignments',
        'app.Nurses',
        'app.Patients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CareAssignments') ? [] : ['className' => CareAssignmentsTable::class];
        $this->CareAssignments = $this->getTableLocator()->get('CareAssignments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CareAssignments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CareAssignmentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CareAssignmentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
