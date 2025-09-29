<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExamStatusUpdatesFixture
 */
class ExamStatusUpdatesFixture extends TestFixture
{
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
                'exam_id' => 1,
                'event_type' => 'Lorem ipsum dolor sit amet',
                'timestamp' => '2025-03-09 09:01:50',
            ],
        ];
        parent::init();
    }
}
