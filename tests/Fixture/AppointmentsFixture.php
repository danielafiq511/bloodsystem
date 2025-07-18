<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AppointmentsFixture
 */
class AppointmentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'appointmentID' => 1,
                'donorID' => 1,
                'donorName' => 'Lorem ipsum dolor sit amet',
                'nric' => 'Lorem ipsu',
                'phoneNumber' => 'Lorem ipsu',
                'gender' => 'Lorem ipsum dolor sit amet',
                'age' => 'L',
                'hospitalID' => 1,
                'hospitalName' => 'Lorem ipsum dolor sit amet',
                'dateTime' => '2025-07-18 05:57:47',
            ],
        ];
        parent::init();
    }
}
