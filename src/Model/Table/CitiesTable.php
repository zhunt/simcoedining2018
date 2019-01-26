<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @property \App\Model\Table\RegionsTable|\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\CityNeighbourhoodsTable|\Cake\ORM\Association\HasMany $CityNeighbourhoods
 * @property \App\Model\Table\CityRegionsTable|\Cake\ORM\Association\HasMany $CityRegions
 * @property \App\Model\Table\IntersectionsTable|\Cake\ORM\Association\HasMany $Intersections
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\HasMany $Venues
 *
 * @method \App\Model\Entity\City get($primaryKey, $options = [])
 * @method \App\Model\Entity\City newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\City[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\City|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\City|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\City patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\City[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\City findOrCreate($search, callable $callback = null, $options = [])
 */
class CitiesTable extends Table
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

        $this->setTable('cities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('CityNeighbourhoods', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('CityRegions', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('Intersections', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('Venues', [
            'foreignKey' => 'city_id'
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
            ->allowEmptyString('venue_count');

        $validator
            ->scalar('locality')
            ->maxLength('locality', 50)
            ->requirePresence('locality', 'create')
            ->allowEmptyString('locality', true);

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

        return $rules;
    }

    // Custom functions
    // gets all the cities with more than one venue
    public function getCitiesWithVenues($params = null) {
        $query = $this->find()
            ->select(['id', 'name', 'slug']);

        if ( isset( $params['order'] ) ) {
            $orderBy = $params['order'];
        } else {
            $orderBy = 'total_venues DESC';
        }
        $query->select(['total_venues' => $query->func()->count('Venues.id')])
            ->leftJoinWith('Venues')
            ->group(['Cities.id'])
            ->having('total_venues > 0 ' )
            ->order($orderBy);
//            ->enableAutoFields(true);

        return $query;
    }

}
