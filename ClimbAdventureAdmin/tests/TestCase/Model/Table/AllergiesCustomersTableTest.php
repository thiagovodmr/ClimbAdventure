<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AllergiesCustomersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AllergiesCustomersTable Test Case
 */
class AllergiesCustomersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AllergiesCustomersTable
     */
    public $AllergiesCustomers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.allergies_customers',
        'app.allergies',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AllergiesCustomers') ? [] : ['className' => AllergiesCustomersTable::class];
        $this->AllergiesCustomers = TableRegistry::getTableLocator()->get('AllergiesCustomers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AllergiesCustomers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
