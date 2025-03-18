<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ScheduledTime Entity
 *
 * @property int $id
 * @property \Cake\I18n\DateTime $start_time
 * @property \Cake\I18n\DateTime $end_time
 *
 * @property \App\Model\Entity\Exam[] $exams
 */
class ScheduledTime extends Entity
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
        'start_time' => true,
        'end_time' => true,
        'exams' => true,
    ];
}
