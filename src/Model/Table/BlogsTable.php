<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blogs Model
 *
 * @method \App\Model\Entity\Blog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Blog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Blog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Blog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blog|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Blog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Blog findOrCreate($search, callable $callback = null, $options = [])
 */
class BlogsTable extends Table
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

        $this->setTable('blogs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('guid')
            ->maxLength('guid', 255)
            ->requirePresence('guid', 'create')
            ->allowEmptyString('guid', false);

        $validator
            ->dateTime('date_modified')
            ->allowEmptyDateTime('date_modified');

        return $validator;
    }
}
