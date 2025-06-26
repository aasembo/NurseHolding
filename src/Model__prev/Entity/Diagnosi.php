<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diagnosi Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property string|null $diagnosis_text
 *
 * @property \App\Model\Entity\Exam $exam
 */
class Diagnosi extends Entity
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
        'diagnosis_text' => true,
        'exam' => true,
    ];
}
