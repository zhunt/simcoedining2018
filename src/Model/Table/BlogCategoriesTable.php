<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogCategories Model
 *
 * @property \App\Model\Table\BlogsTable|\Cake\ORM\Association\BelongsToMany $Blogs
 *
 * @method \App\Model\Entity\BlogCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BlogCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class BlogCategoriesTable extends Table
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

        $this->setTable('blog_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Blogs', [
            'foreignKey' => 'blog_category_id',
            'targetForeignKey' => 'blog_id',
            'joinTable' => 'blogs_blog_categories'
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
            ->allowEmptyString('id', 'create');

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
