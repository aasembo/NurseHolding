<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PatientsFixture
 */
class PatientsFixture extends TestFixture
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
                'FirstName' => 'Lorem ipsum dolor sit amet',
                'LastName' => 'Lorem ipsum dolor sit amet',
                'age' => 1,
                'gender' => 'Lorem ipsum dolor sit amet',
                'medical_record_number' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
