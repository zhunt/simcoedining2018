<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VenueServices Model
 *
 * @property \App\Model\Table\VenueTypesTable|\Cake\ORM\Association\BelongsTo $VenueTypes
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsToMany $Venues
 *
 * @method \App\Model\Entity\VenueService get($primaryKey, $options = [])
 * @method \App\Model\Entity\VenueService newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VenueService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VenueService|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueService|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VenueService[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VenueService findOrCreate($search, callable $callback = null, $options = [])
 */
class VenueServicesTable extends Table
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

        $this->setTable('venue_services');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->belongsTo('VenueTypes', [
            'foreignKey' => 'venue_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Venues', [
            'foreignKey' => 'venue_service_id',
            'targetForeignKey' => 'venue_id',
            'joinTable' => 'venues_venue_services'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['venue_type_id'], 'VenueTypes'));

        return $rules;
    }
}
