<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PatientVisit Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property int|null $accession
 * @property int|null $visit_number
 *
 * @property \App\Model\Entity\Patient $patient
 */
class PatientVisit extends Entity
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
        'patient_id' => true,
        'accession' => true,
        'visit_number' => true,
        'patient' => true,
    ];
}
