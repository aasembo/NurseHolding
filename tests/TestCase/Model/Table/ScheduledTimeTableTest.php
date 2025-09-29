<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScheduledTimeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScheduledTimeTable Test Case
 */
class ScheduledTimeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ScheduledTimeTable
     */
    protected $ScheduledTime;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ScheduledTime',
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
        $config = $this->getTableLocator()->exists('ScheduledTime') ? [] : ['className' => ScheduledTimeTable::class];
        $this->ScheduledTime = $this->getTableLocator()->get('ScheduledTime', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ScheduledTime);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ScheduledTimeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
