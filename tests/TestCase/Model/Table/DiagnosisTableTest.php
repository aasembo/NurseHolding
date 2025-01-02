<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiagnosisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiagnosisTable Test Case
 */
class DiagnosisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiagnosisTable
     */
    protected $Diagnosis;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Diagnosis',
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
        $config = $this->getTableLocator()->exists('Diagnosis') ? [] : ['className' => DiagnosisTable::class];
        $this->Diagnosis = $this->getTableLocator()->get('Diagnosis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Diagnosis);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DiagnosisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DiagnosisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
