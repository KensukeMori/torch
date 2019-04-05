<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StageTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StageTable Test Case
 */
class StageTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StageTable
     */
    public $Stage;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Stage'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Stage') ? [] : ['className' => StageTable::class];
        $this->Stage = TableRegistry::getTableLocator()->get('Stage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stage);

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
