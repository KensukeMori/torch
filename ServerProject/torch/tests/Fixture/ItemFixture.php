<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemFixture
 */
class ItemFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'item';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ItemId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ItemType' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'UserId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'SequenceId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stageId' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Time' => ['type' => 'float', 'length' => 4, 'precision' => 1, 'unsigned' => false, 'null' => false, 'default' => '3.0', 'comment' => ''],
        'XCoordinate' => ['type' => 'float', 'length' => 5, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'YCoordinate' => ['type' => 'float', 'length' => 5, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
        'ZCoordinate' => ['type' => 'float', 'length' => 5, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ItemId'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'ItemId' => 1,
                'ItemType' => 1,
                'UserId' => 1,
                'SequenceId' => 1,
                'stageId' => 1,
                'Time' => 1,
                'XCoordinate' => 1,
                'YCoordinate' => 1,
                'ZCoordinate' => 1
            ],
        ];
        parent::init();
    }
}
