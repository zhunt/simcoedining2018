<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Venues Model
 *
 * @property \App\Model\Table\RegionsTable|\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\CityRegionsTable|\Cake\ORM\Association\BelongsTo $CityRegions
 * @property \App\Model\Table\CityNeighbourhoodsTable|\Cake\ORM\Association\BelongsTo $CityNeighbourhoods
 * @property \App\Model\Table\IntersectionsTable|\Cake\ORM\Association\BelongsTo $Intersections
 * @property \App\Model\Table\PublishStatesTable|\Cake\ORM\Association\BelongsTo $PublishStates
 * @property \App\Model\Table\ChainsTable|\Cake\ORM\Association\BelongsTo $Chains
 * @property \App\Model\Table\ClientTypesTable|\Cake\ORM\Association\BelongsTo $ClientTypes
 * @property \App\Model\Table\VenueAmenitiesTable|\Cake\ORM\Association\BelongsToMany $VenueAmenities
 * @property \App\Model\Table\VenueProductsTable|\Cake\ORM\Association\BelongsToMany $VenueProducts
 * @property \App\Model\Table\VenueServicesTable|\Cake\ORM\Association\BelongsToMany $VenueServices
 * @property \App\Model\Table\VenueSubTypesTable|\Cake\ORM\Association\BelongsToMany $VenueSubtypes
 * @property \App\Model\Table\VenueTypesTable|\Cake\ORM\Association\BelongsToMany $VenueTypes
 *
 * @method \App\Model\Entity\Venue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Venue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Venue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Venue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class VenuesTable extends Table
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

        $this->setTable('venues');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Cities' => ['venue_count']
        ]);

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CityRegions', [
            'foreignKey' => 'city_region_id'
        ]);
        $this->belongsTo('CityNeighbourhoods', [
            'foreignKey' => 'city_neighbourhood_id'
        ]);
        $this->belongsTo('Intersections', [
            'foreignKey' => 'intersection_id'
        ]);
        $this->belongsTo('PublishStates', [
            'foreignKey' => 'publish_state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Chains', [
            'foreignKey' => 'chain_id'
        ]);
        $this->belongsTo('ClientTypes', [
            'foreignKey' => 'client_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('VenueAmenities', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'venue_amenity_id',
            'joinTable' => 'venues_venue_amenities'
        ]);
        $this->belongsToMany('VenueProducts', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'venue_product_id',
            'joinTable' => 'venues_venue_products'
        ]);
        $this->belongsToMany('VenueServices', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'venue_service_id',
            'joinTable' => 'venues_venue_services'
        ]);
        $this->belongsToMany('VenueSubtypes', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'venue_subtype_id',
            'joinTable' => 'venues_venue_subtypes'
        ]);
        $this->belongsToMany('VenueTypes', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'venue_type_id',
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

        $validator
            ->scalar('sub_name')
            ->maxLength('sub_name', 50)
            ->requirePresence('sub_name', 'create')
            ->allowEmptyString('sub_name', true);

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->allowEmptyString('address', false);

        $validator
            ->numeric('geo_lat')
            ->requirePresence('geo_lat', 'create')
            ->allowEmptyString('geo_lat', false);

        $validator
            ->numeric('geo_lng')
            ->requirePresence('geo_lng', 'create')
            ->allowEmptyString('geo_lng', false);

        $validator
            ->scalar('main_image_url')
            ->maxLength('main_image_url', 255)
            ->allowEmptyFile('main_image_url');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->allowEmptyString('phone', false);

        $validator
            ->scalar('website_url')
            ->maxLength('main_image_url', 255)
            ->allowEmptyString('website_url');

        $validator
            ->dateTime('last_verified')
            ->allowEmptyDateTime('last_verified');

        $validator
            ->scalar('hours_sun')
            ->maxLength('hours_sun', 255)
            ->allowEmptyString('hours_sun');

        $validator
            ->scalar('hours_mon')
            ->maxLength('hours_mon', 255)
            ->allowEmptyString('hours_mon');

        $validator
            ->scalar('hours_tue')
            ->maxLength('hours_tue', 255)
            ->allowEmptyString('hours_tue');

        $validator
            ->scalar('hours_wed')
            ->maxLength('hours_wed', 255)
            ->allowEmptyString('hours_wed');

        $validator
            ->scalar('hours_thu')
            ->maxLength('hours_thu', 255)
            ->allowEmptyString('hours_thu');

        $validator
            ->scalar('hours_fri')
            ->maxLength('hours_fri', 255)
            ->allowEmptyString('hours_fri');

        $validator
            ->scalar('hours_sat')
            ->maxLength('hours_sat', 255)
            ->allowEmptyString('hours_sat');

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
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['city_region_id'], 'CityRegions'));
        $rules->add($rules->existsIn(['city_neighbourhood_id'], 'CityNeighbourhoods'));
        $rules->add($rules->existsIn(['intersection_id'], 'Intersections'));
        $rules->add($rules->existsIn(['publish_state_id'], 'PublishStates'));
        $rules->add($rules->existsIn(['chain_id'], 'Chains'));
        $rules->add($rules->existsIn(['client_type_id'], 'ClientTypes'));

        return $rules;
    }

    // Custom functions

    // used for right column, hardcoded to 5 for now
    public function getNewestVenues() {
        $query = $this->find();

        $query->select(['Venues.id', 'Venues.slug', 'Venues.name', 'Venues.sub_name',
            'Venues.address', 'Cities.name', 'Venues.last_verified'])
            ->where([ 'Venues.publish_state_id' => 3, 'Venues.venue_closed' => false ])
            ->contain([
                //'VenueDetails' => ['fields' => ['VenueDetails.last_verified']],
                'Cities' => ['fields' => [ 'id', 'name', 'slug'] ]
            ])
            ->order('Venues.created DESC, Venues.last_verified DESC')
            ->limit(5); // ->enableAutoFields(true);

        // debug($query->toArray());

        return $query;

    }

    /* based on the latt/long passed in, get a list of venues a distance from that point
     * function returns distance in Km (i.e. 0.162 = 162 metres )
     */
    public function getNearbyVenues( $lat = 0, $lng = 0, $venueId = null) { // debug( " $lat, $lng, $venueId ");
        $distance = 10; // 1 = 1000 metres, 10 = 10km
        $limit = 10;

        $venueLat = floatval($lat);
        $venueLng = floatval($lng);

        $query = $this->find();

        $query->select(['Venues.id', 'Venues.name', 'Venues.sub_name', 'Venues.slug',
            'Venues.address', 'Venues.geo_lat',
            'Venues.geo_lng',
            'distance' => '(6371 * acos( cos( radians(' . $venueLat . ') ) * cos( radians( Venues.geo_lat ) ) *
                                cos( radians( Venues.geo_lng ) - radians('. $venueLng .') ) + sin( radians(' . $venueLat . ') ) *
                                sin( radians( Venues.geo_lat ) ) ) )'
        ])
            ->contain(['Cities' => ['fields' => [ 'id', 'name', 'slug']]])
            ->where([
                'Venues.publish_state_id' => 3,
                'Venues.venue_closed' => false,
                'Venues.id !=' => $venueId ])
            ->group('Venues.id')
            ->having( ['distance <=' => $distance ] )
            ->order('distance')
            ->limit($limit);

        return $query;

    }

}
