<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdventuresCustomers Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\AdventuresTable|\Cake\ORM\Association\BelongsTo $Adventures
 *
 * @method \App\Model\Entity\AdventuresCustomer get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdventuresCustomer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdventuresCustomer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdventuresCustomer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdventuresCustomer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdventuresCustomer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdventuresCustomer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdventuresCustomer findOrCreate($search, callable $callback = null, $options = [])
 */
class AdventuresCustomersTable extends Table
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

        $this->setTable('adventures_customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'customer_id', 'adventure_id', 'data']);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Adventures', [
            'foreignKey' => 'adventure_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
        ->date('data')
        ->notEmpty('data');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['adventure_id'], 'Adventures'));

        return $rules;
    }
}
