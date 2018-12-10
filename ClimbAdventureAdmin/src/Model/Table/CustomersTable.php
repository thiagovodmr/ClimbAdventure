<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\AdventureTable|\Cake\ORM\Association\BelongsToMany $Adventure
 * @property \App\Model\Table\AdventuresTable|\Cake\ORM\Association\BelongsToMany $Adventures
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Adventures', [
            'foreignKey' => 'customer_id',
            'targetForeignKey' => 'adventure_id',
            'joinTable' => 'adventures_customers'
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
            ->scalar('Name')
            ->maxLength('Name', 100)
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->scalar('Adress')
            ->maxLength('Adress', 500)
            ->requirePresence('Adress', 'create')
            ->notEmpty('Adress');

        $validator
            ->scalar('RG')
            ->maxLength('RG', 500)
            ->requirePresence('RG', 'create')
            ->notEmpty('RG');

        $validator
            ->integer('Score')
            ->allowEmpty('Score');

        $validator
            ->scalar('CPF')
            ->maxLength('CPF', 550)
            ->requirePresence('CPF', 'create')
            ->notEmpty('CPF');

        $validator
            ->scalar('MotherName')
            ->maxLength('MotherName', 100)
            ->allowEmpty('MotherName');

        $validator
            ->scalar('FatherName')
            ->maxLength('FatherName', 100)
            ->allowEmpty('FatherName');

        return $validator;
    }
}
