<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HospitalsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HospitalsTable Test Case
 */
class HospitalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HospitalsTable
     */
    protected $Hospitals;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Hospitals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Hospitals') ? [] : ['className' => HospitalsTable::class];
        $this->Hospitals = $this->getTableLocator()->get('Hospitals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Hospitals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\HospitalsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
