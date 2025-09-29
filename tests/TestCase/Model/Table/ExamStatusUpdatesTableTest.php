<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamStatusUpdatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamStatusUpdatesTable Test Case
 */
class ExamStatusUpdatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamStatusUpdatesTable
     */
    protected $ExamStatusUpdates;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ExamStatusUpdates',
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
        $config = $this->getTableLocator()->exists('ExamStatusUpdates') ? [] : ['className' => ExamStatusUpdatesTable::class];
        $this->ExamStatusUpdates = $this->getTableLocator()->get('ExamStatusUpdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ExamStatusUpdates);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExamStatusUpdatesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExamStatusUpdatesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
