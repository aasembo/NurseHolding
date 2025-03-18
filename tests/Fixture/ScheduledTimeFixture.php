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
                'start_time' => '2025-03-09 09:06:47',
                'end_time' => '2025-03-09 09:06:47',
            ],
        ];
        parent::init();
    }
}
