<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Allergies Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsToMany $Customers
 *
 * @method \App\Model\Entity\Allergy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Allergy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Allergy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Allergy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allergy|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allergy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Allergy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Allergy findOrCreate($search, callable $callback = null, $options = [])
 */
class AllergiesTable extends Table
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

        $this->setTable('allergies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Customers', [
            'foreignKey' => 'allergy_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'allergies_customers'
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
            ->scalar('Description')
            ->maxLength('Description', 550)
            ->allowEmpty('Description');

        return $validator;
    }
}
