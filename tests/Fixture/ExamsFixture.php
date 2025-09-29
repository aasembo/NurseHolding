<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExamsFixture
 */
class ExamsFixture extends TestFixture
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
                'patient_id' => 1,
                'exam_type' => 'Lorem ipsum dolor sit amet',
                'location_id' => 1,
                'scheduled_time_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2025-03-09 09:01:16',
                'updated_at' => '2025-03-09 09:01:16',
                'imaging_room_id' => 1,
                'technician_id' => 1,
                'specialist_id' => 1,
            ],
        ];
        parent::init();
    }
}
