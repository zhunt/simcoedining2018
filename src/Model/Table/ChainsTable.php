<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chains Model
 *
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\HasMany $Venues
 *
 * @method \App\Model\Entity\Chain get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chain newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chain[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chain|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chain|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chain[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chain findOrCreate($search, callable $callback = null, $options = [])
 */
class ChainsTable extends Table
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

        $this->setTable('chains');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->hasMany('Venues', [
            'foreignKey' => 'chain_id'
        ]);
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
        $rules->add($rules->isUnique(['slug']));
        return $rules;
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('slug')
            ->maxLength('slug', 50)
            ->requirePresence('slug', 'create')
            ->allowEmptyString('slug', 'create');

        return $validator;
    }
}
