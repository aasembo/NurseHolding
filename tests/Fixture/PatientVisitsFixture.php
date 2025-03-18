<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PatientVisitsFixture
 */
class PatientVisitsFixture extends TestFixture
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
                'accession' => 1,
                'visit_number' => 1,
            ],
        ];
        parent::init();
    }
}
