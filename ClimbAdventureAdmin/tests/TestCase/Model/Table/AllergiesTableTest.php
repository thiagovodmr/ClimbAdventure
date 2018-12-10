<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AllergiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AllergiesTable Test Case
 */
class AllergiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AllergiesTable
     */
    public $Allergies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Allergies') ? [] : ['className' => AllergiesTable::class];
        $this->Allergies = TableRegistry::getTableLocator()->get('Allergies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Allergies);

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
