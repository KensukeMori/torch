<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Item Model
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('item');
        $this->setDisplayField('ItemId');
        $this->setPrimaryKey('ItemId');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('ItemId')
            ->allowEmptyString('ItemId', 'create');

        $validator
            ->integer('ItemType')
            ->requirePresence('ItemType', 'create')
            ->allowEmptyString('ItemType', false);

        $validator
            ->integer('UserId')
            ->requirePresence('UserId', 'create')
            ->allowEmptyString('UserId', false);

        $validator
            ->integer('SequenceId')
            ->requirePresence('SequenceId', 'create')
            ->allowEmptyString('SequenceId', false);

        $validator
            ->integer('stageId')
            ->requirePresence('stageId', 'create')
            ->allowEmptyString('stageId', false);

        $validator
            ->numeric('Time')
            ->requirePresence('Time', 'create')
            ->allowEmptyString('Time', false);

        $validator
            ->numeric('XCoordinate')
            ->requirePresence('XCoordinate', 'create')
            ->allowEmptyString('XCoordinate', false);

        $validator
            ->numeric('YCoordinate')
            ->requirePresence('YCoordinate', 'create')
            ->allowEmptyString('YCoordinate', false);

        $validator
            ->numeric('ZCoordinate')
            ->requirePresence('ZCoordinate', 'create')
            ->allowEmptyString('ZCoordinate', false);

        return $validator;
    }
}
