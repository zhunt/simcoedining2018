<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VenueTypes Model
 *
 * @property \App\Model\Table\VenueAmenitiesTable|\Cake\ORM\Association\HasMany $VenueAmenities
 * @property \App\Model\Table\VenueProductsTable|\Cake\ORM\Association\HasMany $VenueProducts
 * @property \App\Model\Table\VenueServicesTable|\Cake\ORM\Association\HasMany $VenueServices
 * @property \App\Model\Table\VenueSubtypesTable|\Cake\ORM\Association\HasMany $VenueSubtypes
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsToMany $Venues
 *
 * @method \App\Model\Entity\VenueType get($primaryKey, $options = [])
 * @method \App\Model\Entity\VenueType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VenueType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VenueType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VenueType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VenueType findOrCreate($search, callable $callback = null, $options = [])
 */
class VenueTypesTable extends Table
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

        $this->setTable('venue_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->hasMany('VenueAmenities', [
            'foreignKey' => 'venue_type_id'
        ]);
        $this->hasMany('VenueProducts', [
            'foreignKey' => 'venue_type_id'
        ]);
        $this->hasMany('VenueServices', [
            'foreignKey' => 'venue_type_id'
        ]);
        $this->hasMany('VenueSubtypes', [
            'foreignKey' => 'venue_type_id'
        ]);
        $this->belongsToMany('Venues', [
            'foreignKey' => 'venue_type_id',
            'targetForeignKey' => 'venue_id',
            'joinTable' => 'venues_venue_types'
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

    // ------------- Custom functions

    public function getVenueTypesWithVenues($cityId = 0 ) { // $cityId
        $query = $this->find();
        $query->select(['total_venues' => $query->func()->count('Venues.id'), 'VenueTypes.name', 'VenueTypes.slug', 'Venues.city_id'])
            ->leftJoinWith('Venues')
            ->group(['VenueTypes.id'])
            ->having('total_venues > 0 ' )
            // ->where(['Venues.city_id' => $cityId]) // remove this if not by city
            ->order('total_venues DESC');

        if ( $cityId > 0) {
            $query->where(['Venues.city_id' => $cityId]);
        }

        return $query;
    }

}
