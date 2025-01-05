<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exam Entity
 *
 * @property int $id
 * @property int|null $patient_id
 * @property string $exam_type
 * @property int|null $location_id
 * @property int|null $scheduled_time_id
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 * @property int|null $imaging_room_id
 *
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\ScheduledTime $scheduled_time
 * @property \App\Model\Entity\ImagingRoom $imaging_room
 * @property \App\Model\Entity\Diagnosi[] $diagnosis
 * @property \App\Model\Entity\Reporting[] $reporting
 * @property \App\Model\Entity\Sedation[] $sedations
 * @property \App\Model\Entity\Timing[] $timings
 */
class Exam extends Entity
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
        'exam_type' => true,
        'location_id' => true,
        'scheduled_time_id' => true,
        'status' => true,
        'created_at' => true,
        'updated_at' => true,
        'imaging_room_id' => true,
        'patient' => true,
        'location' => true,
        'scheduled_time' => true,
        'imaging_room' => true,
        'diagnosis' => true,
        'reporting' => true,
        'sedations' => true,
        'timings' => true,
    ];
}
