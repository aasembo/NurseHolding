<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientVisitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientVisitsTable Test Case
 */
class PatientVisitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientVisitsTable
     */
    protected $PatientVisits;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.PatientVisits',
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
        $config = $this->getTableLocator()->exists('PatientVisits') ? [] : ['className' => PatientVisitsTable::class];
        $this->PatientVisits = $this->getTableLocator()->get('PatientVisits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PatientVisits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PatientVisitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PatientVisitsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
