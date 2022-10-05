<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProvincesState Entity
 *
 * @property int $id
 * @property int $country_id
 * @property string $province_states
 *
 * @property \App\Model\Entity\Country $country
 */
class ProvincesState extends Entity
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
    protected $_accessible = [
        'country_id' => true,
        'province_states' => true,
        'country' => true,
    ];
}
