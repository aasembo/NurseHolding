<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagingRoomsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagingRoomsTable Test Case
 */
class ImagingRoomsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagingRoomsTable
     */
    protected $ImagingRooms;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ImagingRooms',
        'app.Exams',
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
        $config = $this->getTableLocator()->exists('ImagingRooms') ? [] : ['className' => ImagingRoomsTable::class];
        $this->ImagingRooms = $this->getTableLocator()->get('ImagingRooms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ImagingRooms);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ImagingRoomsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
