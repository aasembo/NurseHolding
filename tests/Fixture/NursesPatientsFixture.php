<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NursesPatientsFixture
 */
class NursesPatientsFixture extends TestFixture
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
                'nurse_id' => 1,
                'patient_id' => 1,
            ],
        ];
        parent::init();
    }
}
