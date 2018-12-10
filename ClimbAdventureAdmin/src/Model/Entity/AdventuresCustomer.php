<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdventuresCustomer Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $adventure_id
 * @property \Cake\I18n\FrozenDate $date
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Adventure $adventure
 */
class AdventuresCustomer extends Entity
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
        "*"=>true
    ];
}
