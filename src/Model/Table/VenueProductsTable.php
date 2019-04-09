<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VenueProducts Model
 *
 * @property \App\Model\Table\VenueTypesTable|\Cake\ORM\Association\BelongsTo $VenueTypes
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsToMany $Venues
 *
 * @method \App\Model\Entity\VenueProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\VenueProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VenueProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VenueProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueProduct|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VenueProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VenueProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class VenueProductsTable extends Table
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

        $this->setTable('venue_products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehaviors( ['Muffin/Slug.Slug'] );

        $this->belongsTo('VenueTypes', [
            'foreignKey' => 'venue_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Venues', [
            'foreignKey' => 'venue_product_id',
            'targetForeignKey' => 'venue_id',
            'joinTable' => 'venues_venue_products'
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

    // custom functions

    public function getProductsWithVenues($cityId = 0 ) { // $cityId
        $query = $this->find()->enableHydration(false);
        $query->select(['total_venues' => $query->func()->count('Venues.id'), 'VenueProducts.name', 'VenueProducts.slug', 'Venues.city_id'])
            ->leftJoinWith('Venues')
            ->group(['VenueProducts.id'])
            ->having('total_venues > 0 ' )
           // ->where(['Venues.city_id' => $cityId]) // remove this if not by city
           ->where(['Venues.publish_state_id' => 3, 'Venues.venue_closed !=' => true ])
            ->order('total_venues DESC');

        if ( $cityId > 0) {
            $query->where(['Venues.city_id' => $cityId]);
        }

        return $query;
    }


}
