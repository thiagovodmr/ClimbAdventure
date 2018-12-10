<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adventure Entity
 *
 * @property int $id
 * @property string $Title
 * @property string|null $Adress
 * @property string|null $Description
 *
 * @property \App\Model\Entity\AdventureCustomer[] $adventure_customers
 * @property \App\Model\Entity\Customer[] $customers
 */
class Adventure extends Entity
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
        "*"=> True
    ];
}
