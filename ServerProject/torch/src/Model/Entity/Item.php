<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $ItemId
 * @property int $ItemType
 * @property int $UserId
 * @property int $SequenceId
 * @property int $stageId
 * @property float $Time
 * @property float $XCoordinate
 * @property float $YCoordinate
 * @property float $ZCoordinate
 */
class Item extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'ItemType' => true,
        'UserId' => true,
        'SequenceId' => true,
        'stageId' => true,
        'Time' => true,
        'XCoordinate' => true,
        'YCoordinate' => true,
        'ZCoordinate' => true
    ];
}
