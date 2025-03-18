<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PatientLog Entity
 *
 * @property int $id
 * @property string $reviewed_by
 * @property string $called_by
 * @property string $comments
 * @property int $exam_id
 *
 * @property \App\Model\Entity\Exam $exam
 */
class PatientLog extends Entity
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
        'reviewed_by' => true,
        'called_by' => true,
        'comments' => true,
        'exam_id' => true,
        'exam' => true,
    ];
}
