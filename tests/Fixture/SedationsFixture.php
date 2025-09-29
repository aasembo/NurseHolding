<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SedationsFixture
 */
class SedationsFixture extends TestFixture
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
                'sedation_type' => 'Lorem ipsum dolor sit amet',
                'dose' => 1,
            ],
        ];
        parent::init();
    }
}
