<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $FirstName
 * @property string $LastName
 * @property int|null $age
 * @property string $gender
 * @property string $medical_record_number
 *
 * @property \App\Model\Entity\CareAssignment[] $care_assignments
 * @property \App\Model\Entity\Exam[] $exams
 * @property \App\Model\Entity\NursingIntervention[] $nursing_intervention
 * @property \App\Model\Entity\PatientVisit[] $patient_visits
 */
class Patient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'FirstName' => true,
        'LastName' => true,
        'age' => true,
        'gender' => true,
        'medical_record_number' => true,
        'care_assignments' => true,
        'exams' => true,
        'nursing_intervention' => true,
        'patient_visits' => true,
    ];
}
