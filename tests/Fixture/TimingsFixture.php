<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TimingsFixture
 */
class TimingsFixture extends TestFixture
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
                'start_time' => '2024-12-15 18:43:04',
                'end_time' => '2024-12-15 18:43:04',
                'HOLDING' => '2024-12-15 18:43:04',
                'DISCHARGE' => '2024-12-15 18:43:04',
                'patient_id' => 1,
            ],
        ];
        parent::init();
    }
}
