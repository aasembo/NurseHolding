<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagingRoomsFixture
 */
class ImagingRoomsFixture extends TestFixture
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
                'room_name' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-12-15 18:43:04',
                'updated_at' => '2024-12-15 18:43:04',
            ],
        ];
        parent::init();
    }
}
