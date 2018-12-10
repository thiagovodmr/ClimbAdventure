<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdventuresCustomersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdventuresCustomersTable Test Case
 */
class AdventuresCustomersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdventuresCustomersTable
     */
    public $AdventuresCustomers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adventures_customers',
        'app.customers',
        'app.adventures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdventuresCustomers') ? [] : ['className' => AdventuresCustomersTable::class];
        $this->AdventuresCustomers = TableRegistry::getTableLocator()->get('AdventuresCustomers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdventuresCustomers);

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
