<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hospital Entity
 *
 * @property int $hospitalID
 * @property string $hospitalName
 * @property string $address
 * @property string $contactInfo
 */
class Hospital extends Entity
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
        'hospitalName' => true,
        'address' => true,
        'contactInfo' => true,
    ];
}
