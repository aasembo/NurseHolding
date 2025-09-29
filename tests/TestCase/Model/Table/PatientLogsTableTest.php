<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientLogsTable Test Case
 */
class PatientLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientLogsTable
     */
    protected $PatientLogs;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.PatientLogs',
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
        $config = $this->getTableLocator()->exists('PatientLogs') ? [] : ['className' => PatientLogsTable::class];
        $this->PatientLogs = $this->getTableLocator()->get('PatientLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PatientLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PatientLogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PatientLogsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
