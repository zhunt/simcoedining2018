<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VenueAmenities Model
 *
 * @property \App\Model\Table\VenueTypesTable|\Cake\ORM\Association\BelongsTo $VenueTypes
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsToMany $Venues
 *
 * @method \App\Model\Entity\VenueAmenity get($primaryKey, $options = [])
 * @method \App\Model\Entity\VenueAmenity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VenueAmenity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VenueAmenity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueAmenity|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueAmenity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VenueAmenity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VenueAmenity findOrCreate($search, callable $callback = null, $options = [])
 */
class VenueAmenitiesTable extends Table
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

        $this->setTable('venue_amenities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->belongsTo('VenueTypes', [
            'foreignKey' => 'venue_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Venues', [
            'foreignKey' => 'venue_amenity_id',
            'targetForeignKey' => 'venue_id',
            'joinTable' => 'venues_venue_amenities'
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
