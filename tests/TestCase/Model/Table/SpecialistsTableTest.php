<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecialistsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecialistsTable Test Case
 */
class SpecialistsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecialistsTable
     */
    protected $Specialists;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Specialists',
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
        $config = $this->getTableLocator()->exists('Specialists') ? [] : ['className' => SpecialistsTable::class];
        $this->Specialists = $this->getTableLocator()->get('Specialists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Specialists);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SpecialistsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SpecialistsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
