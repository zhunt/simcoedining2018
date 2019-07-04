<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blogs Model
 *
 * @property \App\Model\Table\BlogCategoriesTable|\Cake\ORM\Association\BelongsToMany $BlogCategories
 * @property \App\Model\Table\BlogLocationsTable|\Cake\ORM\Association\BelongsToMany $BlogLocations
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsToMany $Venues
 *
 * @method \App\Model\Entity\Blog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Blog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Blog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Blog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
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

        $this->belongsToMany('BlogCategories', [
            'foreignKey' => 'blog_id',
            'targetForeignKey' => 'blog_category_id',
            'joinTable' => 'blogs_blog_categories'
        ]);
        $this->belongsToMany('BlogLocations', [
            'foreignKey' => 'blog_id',
            'targetForeignKey' => 'blog_location_id',
            'joinTable' => 'blogs_blog_locations'
        ]);
        $this->belongsToMany('Venues', [
            'foreignKey' => 'blog_id',
            'targetForeignKey' => 'venue_id',
            'joinTable' => 'blogs_venues'
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('title_image_url')
            ->maxLength('title_image_url', 255)
            ->requirePresence('title_image_url', 'create')
            ->allowEmptyFile('title_image_url', false);
        
        $validator
            ->scalar('social_image_url')
            ->maxLength('social_image_url', 255)
            ->requirePresence('social_image_url', 'create')
            ->allowEmptyFile('social_image_url', false);

        $validator
            ->scalar('home_page_description')
            ->requirePresence('home_page_description', 'create')
            ->allowEmptyString('home_page_description', false);

        $validator
            ->scalar('wordpress_guid')
            ->maxLength('wordpress_guid', 255)
            ->requirePresence('wordpress_guid', 'create')
            ->allowEmptyString('wordpress_guid', false);

        $validator
            ->scalar('blog_content')
            ->allowEmptyString('blog_content');

        $validator
            ->scalar('blog_lead')
            ->allowEmptyString('blog_lead');

        $validator
            ->scalar('seo_desc')
            ->maxLength('seo_desc', 200)
            ->requirePresence('seo_desc', 'create')
            ->allowEmptyString('seo_desc', false);

        $validator
            ->dateTime('date_created')
            ->allowEmptyDateTime('date_created');

        $validator
            ->dateTime('date_modified')
            ->allowEmptyDateTime('date_modified');

        return $validator;
    }
}
