<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NursingInterventionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NursingInterventionTable Test Case
 */
class NursingInterventionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NursingInterventionTable
     */
    protected $NursingIntervention;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.NursingIntervention',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NursingIntervention') ? [] : ['className' => NursingInterventionTable::class];
        $this->NursingIntervention = $this->getTableLocator()->get('NursingIntervention', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NursingIntervention);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NursingInterventionTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
