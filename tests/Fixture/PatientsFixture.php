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
                'LastName' => 'Lorem ipsum dolor sit amet',
                'FirstName' => 'Lorem ipsum dolor sit amet',
                'age' => 1,
                'gender' => 'Lorem ipsum dolor sit amet',
                'medical_record_number' => 'Lorem ipsum dolor sit amet',
                'OrderReviewedBy' => 'Lorem ipsum dolor sit amet',
                'PatientCalledBy' => 'Lorem ipsum dolor sit amet',
                'comments' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'imaging_room_id' => 1,
                'sedation_id' => 1,
                'diagnosis_id' => 1,
            ],
        ];
        parent::init();
    }
}
