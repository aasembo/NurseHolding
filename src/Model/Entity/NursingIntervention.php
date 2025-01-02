<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NursingIntervention Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $intervention_date
 * @property bool|null $child_life
 * @property bool|null $piv
 * @property bool|null $picc_team
 * @property bool|null $port_access
 * @property bool|null $foley
 * @property bool|null $circulating_monitoring
 * @property bool|null $labs
 * @property bool|null $ekg
 * @property bool|null $meds
 * @property string|null $comments
 * @property \Cake\I18n\DateTime|null $created_at
 * @property \Cake\I18n\DateTime|null $updated_at
 */
class NursingIntervention extends Entity
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
        'intervention_date' => true,
        'child_life' => true,
        'piv' => true,
        'picc_team' => true,
        'port_access' => true,
        'foley' => true,
        'circulating_monitoring' => true,
        'labs' => true,
        'ekg' => true,
        'meds' => true,
        'comments' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
