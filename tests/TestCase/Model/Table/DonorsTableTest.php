<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DonorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DonorsTable Test Case
 */
class DonorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DonorsTable
     */
    protected $Donors;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Donors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Donors') ? [] : ['className' => DonorsTable::class];
        $this->Donors = $this->getTableLocator()->get('Donors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Donors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DonorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
