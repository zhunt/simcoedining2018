<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provinces Model
 *
 * @method \App\Model\Entity\Province get($primaryKey, $options = [])
 * @method \App\Model\Entity\Province newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Province[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Province|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Province|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Province patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Province[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Province findOrCreate($search, callable $callback = null, $options = [])
 */
class ProvincesTable extends Table
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

        $this->setTable('provinces');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Muffin/Slug.Slug');
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
            ->allowEmptyString('slug', 'create'); // only on create - slugger will fill in

        $validator
            ->scalar('administrative_area_level_1')
            ->maxLength('administrative_area_level_1', 50)
            ->requirePresence('administrative_area_level_1', 'create')
            ->allowEmptyString('administrative_area_level_1', true); // was false

        return $validator;
    }
}
