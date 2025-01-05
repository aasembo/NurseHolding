<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ScheduledTimeFixture
 */
class ScheduledTimeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'scheduled_time';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'start_time' => '2024-12-15 18:43:04',
                'end_time' => '2024-12-15 18:43:04',
            ],
        ];
        parent::init();
    }
}
