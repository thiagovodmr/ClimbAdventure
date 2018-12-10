<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adventures Model
 *
 * @property \App\Model\Table\AdventureCustomersTable|\Cake\ORM\Association\HasMany $AdventureCustomers
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsToMany $Customers
 *
 * @method \App\Model\Entity\Adventure get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adventure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adventure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adventure|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adventure|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adventure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adventure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adventure findOrCreate($search, callable $callback = null, $options = [])
 */
class AdventuresTable extends Table
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

        $this->setTable('adventures');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('AdventuresCustomers', [
            'foreignKey' => 'adventure_id'
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'adventure_id',
            'targetForeignKey' => 'customer_id',
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
            ->scalar('Title')
            ->maxLength('Title', 500)
            ->requirePresence('Title', 'create')
            ->notEmpty('Title');

        $validator
            ->scalar('Adress')
            ->maxLength('Adress', 500)
            ->allowEmpty('Adress');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 550)
            ->allowEmpty('Description');

        return $validator;
    }
}
