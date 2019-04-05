<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemtypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemtypeTable Test Case
 */
class ItemtypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemtypeTable
     */
    public $Itemtype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Itemtype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Itemtype') ? [] : ['className' => ItemtypeTable::class];
        $this->Itemtype = TableRegistry::getTableLocator()->get('Itemtype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Itemtype);

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
