<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdventuresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdventuresTable Test Case
 */
class AdventuresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdventuresTable
     */
    public $Adventures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adventures',
        'app.adventure_customers',
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
        $config = TableRegistry::getTableLocator()->exists('Adventures') ? [] : ['className' => AdventuresTable::class];
        $this->Adventures = TableRegistry::getTableLocator()->get('Adventures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adventures);

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
}
