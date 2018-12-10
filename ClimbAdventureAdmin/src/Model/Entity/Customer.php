<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $Name
 * @property string $Adress
 * @property string $RG
 * @property int|null $Score
 * @property string $CPF
 * @property string|null $MotherName
 * @property string|null $FatherName
 *
 * @property \App\Model\Entity\Adventure[] $adventure
 * @property \App\Model\Entity\Adventure[] $adventures
 */
class Customer extends Entity
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
        "*" => true
    ];
}
