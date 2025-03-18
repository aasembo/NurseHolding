<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamTimingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamTimingsTable Test Case
 */
class ExamTimingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamTimingsTable
     */
    protected $ExamTimings;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ExamTimings',
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
        $config = $this->getTableLocator()->exists('ExamTimings') ? [] : ['className' => ExamTimingsTable::class];
        $this->ExamTimings = $this->getTableLocator()->get('ExamTimings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ExamTimings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExamTimingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExamTimingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
