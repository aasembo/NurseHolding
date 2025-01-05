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
                'created_at' => '2024-12-15 18:43:03',
                'updated_at' => '2024-12-15 18:43:03',
                'imaging_room_id' => 1,
            ],
        ];
        parent::init();
    }
}
