<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AllergiesCustomers Model
 *
 * @property \App\Model\Table\AllergiesTable|\Cake\ORM\Association\BelongsTo $Allergies
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\AllergiesCustomer get($primaryKey, $options = [])
 * @method \App\Model\Entity\AllergiesCustomer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AllergiesCustomer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AllergiesCustomer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AllergiesCustomer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AllergiesCustomer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AllergiesCustomer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AllergiesCustomer findOrCreate($search, callable $callback = null, $options = [])
 */
class AllergiesCustomersTable extends Table
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

        $this->setTable('allergies_customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Allergies', [
            'foreignKey' => 'allergy_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
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
        $rules->add($rules->existsIn(['allergy_id'], 'Allergies'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
