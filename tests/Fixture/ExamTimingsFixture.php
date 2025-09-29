<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExamTimingsFixture
 */
class ExamTimingsFixture extends TestFixture
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
                'start_time' => '2025-03-09 09:02:09',
                'end_time' => '2025-03-09 09:02:09',
            ],
        ];
        parent::init();
    }
}
