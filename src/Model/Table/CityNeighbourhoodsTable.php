<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CityNeighbourhoods Model
 *
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\HasMany $Venues
 *
 * @method \App\Model\Entity\CityNeighbourhood get($primaryKey, $options = [])
 * @method \App\Model\Entity\CityNeighbourhood newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CityNeighbourhood[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CityNeighbourhood|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CityNeighbourhood|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CityNeighbourhood patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CityNeighbourhood[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CityNeighbourhood findOrCreate($search, callable $callback = null, $options = [])
 */
class CityNeighbourhoodsTable extends Table
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

        $this->setTable('city_neighbourhoods');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Venues', [
            'foreignKey' => 'city_neighbourhood_id'
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
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }

    // custom functions

    public function getNeighbourhoodsWithVenues($cityId = 0 ) { // $cityId
        $query = $this->find();
        $query->select(['total_venues' => $query->func()->count('Venues.id'), 'CityNeighbourhoods.name', 'CityNeighbourhoods.slug', 'Venues.city_id'])
            ->leftJoinWith('Venues')
            ->group(['CityNeighbourhoods.id'])
            ->having('total_venues > 0 ' )
            // ->where(['Venues.city_id' => $cityId]) // remove this if not by city
            ->order('total_venues DESC');

        if ( $cityId > 0) {
            $query->where(['Venues.city_id' => $cityId]);
        }

        return $query;
    }

}
