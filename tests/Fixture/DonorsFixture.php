<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DonorsFixture
 */
class DonorsFixture extends TestFixture
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
                'donorID' => 1,
                'donorName' => 'Lorem ipsum dolor sit amet',
                'nric' => 'Lorem ipsu',
                'phoneNumber' => 'Lorem ipsu',
                'address' => 'Lorem ipsum dolor sit amet',
                'bloodType' => 'L',
                'gender' => 'Lorem ipsum dolor sit amet',
                'age' => 'L',
            ],
        ];
        parent::init();
    }
}
