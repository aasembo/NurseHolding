<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $LastName
 * @property string $FirstName
 * @property int|null $age
 * @property string $gender
 * @property string $medical_record_number
 * @property string $OrderReviewedBy
 * @property string $PatientCalledBy
 * @property string $comments
 * @property int|null $imaging_room_id
 * @property int|null $sedation_id
 * @property int|null $diagnosis_id
 *
 * @property \App\Model\Entity\ImagingRoom $imaging_room
 * @property \App\Model\Entity\Sedation $sedation
 * @property \App\Model\Entity\Exam[] $exams
 * @property \App\Model\Entity\Timing[] $timings
 * @property \App\Model\Entity\Nurse[] $nurses
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
        'LastName' => true,
        'FirstName' => true,
        'age' => true,
        'gender' => true,
        'medical_record_number' => true,
        'OrderReviewedBy' => true,
        'PatientCalledBy' => true,
        'comments' => true,
        'imaging_room_id' => true,
        'sedation_id' => true,
        'diagnosis_id' => true,
        'imaging_room' => true,
        'sedation' => true,
        'exams' => true,
        'timings' => true,
        'nurses' => true,
    ];
}
