<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogLocations Model
 *
 * @property \App\Model\Table\BlogsTable|\Cake\ORM\Association\BelongsToMany $Blogs
 *
 * @method \App\Model\Entity\BlogLocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogLocation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BlogLocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogLocation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogLocation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogLocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogLocation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogLocation findOrCreate($search, callable $callback = null, $options = [])
 */
class BlogLocationsTable extends Table
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

        $this->setTable('blog_locations');
        $this->setDisplayField('name');

        $this->belongsToMany('Blogs', [
            'foreignKey' => 'blog_location_id',
            'targetForeignKey' => 'blog_id',
            'joinTable' => 'blogs_blog_locations'
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
            ->nonNegativeInteger('id')
            ->requirePresence('id', 'create')
            ->allowEmptyString('id', false);

        $validator
            ->scalar('slug')
            ->maxLength('slug', 100)
            ->requirePresence('slug', 'create')
            ->allowEmptyString('slug', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
