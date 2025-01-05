<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NursesPatientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NursesPatientsTable Test Case
 */
class NursesPatientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NursesPatientsTable
     */
    protected $NursesPatients;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.NursesPatients',
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
        $config = $this->getTableLocator()->exists('NursesPatients') ? [] : ['className' => NursesPatientsTable::class];
        $this->NursesPatients = $this->getTableLocator()->get('NursesPatients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NursesPatients);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NursesPatientsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NursesPatientsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
