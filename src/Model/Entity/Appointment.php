<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity
 *
 * @property int $appointmentID
 * @property int $donorID
 * @property string $donorName
 * @property string $nric
 * @property string $phoneNumber
 * @property string $gender
 * @property string $age
 * @property int $hospitalID
 * @property string $hospitalName
 * @property \Cake\I18n\DateTime $dateTime
 */
class Appointment extends Entity
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
        'donorID' => true,
        'donorName' => true,
        'nric' => true,
        'phoneNumber' => true,
        'gender' => true,
        'age' => true,
        'hospitalID' => true,
        'hospitalName' => true,
        'dateTime' => true,
    ];
}
