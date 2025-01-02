<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Timing Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property \Cake\I18n\DateTime $start_time
 * @property \Cake\I18n\DateTime $end_time
 * @property \Cake\I18n\DateTime $HOLDING
 * @property \Cake\I18n\DateTime $DISCHARGE
 * @property int $patient_id
 *
 * @property \App\Model\Entity\Exam $exam
 * @property \App\Model\Entity\Patient $patient
 */
class Timing extends Entity
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
        'start_time' => true,
        'end_time' => true,
        'HOLDING' => true,
        'DISCHARGE' => true,
        'patient_id' => true,
        'exam' => true,
        'patient' => true,
    ];
}
