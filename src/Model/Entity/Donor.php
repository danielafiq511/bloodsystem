<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Donor Entity
 *
 * @property int $donorID
 * @property string $donorName
 * @property string $nric
 * @property string $phoneNumber
 * @property string $address
 * @property string $bloodType
 * @property string $gender
 * @property string $age
 */
class Donor extends Entity
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
        'donorName' => true,
        'nric' => true,
        'phoneNumber' => true,
        'address' => true,
        'bloodType' => true,
        'gender' => true,
        'age' => true,
    ];
}
