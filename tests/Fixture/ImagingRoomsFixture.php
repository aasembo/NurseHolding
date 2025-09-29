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
                'created_at' => '2025-03-09 09:03:16',
                'updated_at' => '2025-03-09 09:03:16',
            ],
        ];
        parent::init();
    }
}
