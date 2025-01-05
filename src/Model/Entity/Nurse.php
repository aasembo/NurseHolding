<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nurse Entity
 *
 * @property int $id
 * @property string $LastName
 * @property string $FirstName
 * @property string $email
 * @property string|null $VoalteNumber
 * @property string|null $specialty
 *
 * @property \App\Model\Entity\Patient[] $patients
 */
class Nurse extends Entity
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
        'email' => true,
        'VoalteNumber' => true,
        'specialty' => true,
        'patients' => true,
    ];
}
