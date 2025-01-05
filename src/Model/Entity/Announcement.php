<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Announcement Entity
 *
 * @property int $id
 * @property string $CallIn
 * @property string $GoodCatches
 * @property string $content
 * @property \Cake\I18n\DateTime|null $created_at
 * @property string $Falls
 * @property string $ERS
 * @property string $KUDOS
 * @property string $EquipmentIssue
 * @property string $SituationalAwareness
 * @property string|resource|null $image
 */
class Announcement extends Entity
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
        'CallIn' => true,
        'GoodCatches' => true,
        'content' => true,
        'created_at' => true,
        'Falls' => true,
        'ERS' => true,
        'KUDOS' => true,
        'EquipmentIssue' => true,
        'SituationalAwareness' => true,
        'image' => true,
    ];
}
