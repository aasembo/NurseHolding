<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sedation Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property string|null $sedation_type
 * @property float|null $dose
 *
 * @property \App\Model\Entity\Exam $exam
 * @property \App\Model\Entity\Patient[] $patients
 */
class Sedation extends Entity
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
        'exam_id' => true,
        'sedation_type' => true,
        'dose' => true,
        'exam' => true,
        'patients' => true,
    ];
}
