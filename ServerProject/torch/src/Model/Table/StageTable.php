<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stage Model
 *
 * @method \App\Model\Entity\Stage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stage findOrCreate($search, callable $callback = null, $options = [])
 */
class StageTable extends Table
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

        $this->setTable('stage');
        $this->setDisplayField('stageId');
        $this->setPrimaryKey('stageId');
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
            ->integer('stageId')
            ->allowEmptyString('stageId', 'create');

        $validator
            ->scalar('stageName')
            ->maxLength('stageName', 20)
            ->requirePresence('stageName', 'create')
            ->allowEmptyString('stageName', false);

        return $validator;
    }
}
