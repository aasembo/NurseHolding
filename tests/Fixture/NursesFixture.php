<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NursesFixture
 */
class NursesFixture extends TestFixture
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
                'LastName' => 'Lorem ipsum dolor sit amet',
                'FirstName' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'VoalteNumber' => 'Lorem ipsum d',
                'specialty' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
