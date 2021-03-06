<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event; // needed for beforeFilter
use Cake\Core\Configure;

use Cake\Http\Client;
use Cake\Utility\Text;
use Cake\I18n\Time;


/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 *
 * @method \App\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        // allow these actions to run without being logged-in
        $this->Auth->allow(['index', 'view', 'display']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $blogs = $this->paginate($this->Blogs);

        $this->set(compact('blogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => ['BlogCategories', 'BlogLocations', 'Venues']
        ]);

        $this->set('blog', $blog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blog = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->getData());
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog could not be saved. Please, try again.'));
        }
        $blogCategories = $this->Blogs->BlogCategories->find('list', ['limit' => 200]);
        $blogLocations = $this->Blogs->BlogLocations->find('list', ['limit' => 200]);
        $venues = $this->Blogs->Venues->find('list', ['limit' => 200]);
        $this->set(compact('blog', 'blogCategories', 'blogLocations', 'venues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => ['BlogCategories', 'BlogLocations', 'Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->getData());
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog could not be saved. Please, try again.'));
        }
        $blogCategories = $this->Blogs->BlogCategories->find('list', ['limit' => 200]);
        $blogLocations = $this->Blogs->BlogLocations->find('list', ['limit' => 200]);
        $venues = $this->Blogs->Venues->find('list', ['limit' => 200]);
        $this->set(compact('blog', 'blogCategories', 'blogLocations', 'venues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success(__('The blog has been deleted.'));
        } else {
            $this->Flash->error(__('The blog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    ///
    // -----------------

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($slug)
    {
        $http = new Client();

        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?_embed=1&per_page=2 <-- get latest 2 posts with extra data
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?categories=2&_embed=1 <-- get latest posts in category 2
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?tags=9 <-- get latest posts with tag
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?tags=9,10 <-- get latest posts with tags
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?tags_slug=barrie
        // http://localhost:8090/webroot/admin-wordpress/wp-json/acf/v3/posts/12 <-- ACF fields for a post
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?orderby=modified <-- get most recently updated (incl. ACF fields)
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?orderby=modified&order=asc <-- order by asc/desc (desc is default)

        // new: http://www.blog.simcoedining.com/wp-json/wp/v2/posts

        //$url = 'http://www.blog.simcoedining.com/wp-json/wp/v2/posts/?per_page=3';

        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts/?slug=the-february-blues-xviii-barrie

        $response = $http->get('http://www.blog.simcoedining.com/wp-json/wp/v2/posts/', ['slug' => $slug, '_embed' => 1 ]);

        if ( $response->isOk() ) {
            $json = $response->getJson();

            // debug($json);
            $wpPosts = [];
            foreach ($json as $row ) {
                $wpPosts[] = [
                    'id' => $row['id'],
                    'title' => $row['title']['rendered'],
                    'slug' => $row['slug'],
                    'date_gmt' => $row['date_gmt'],
                    'image_url' => $row['acf']['home_page_image'],
                    'content' => $row['content']['rendered'],
                    'excerpt' => strip_tags($row['excerpt']['rendered']) // => Text::stripLinks($row['excerpt']['rendered']) // a href=\"http://blog.simcoedining.com/simcoe-hospitality-awards-2015/\">Continue reading <span class=\"meta-nav\">&rarr;</span></a>
                ];
            }
        } else {
            $wpPosts = [ 0 => 'No blog found.'];
        }

        $wpPost = $wpPosts[0];

        // replace any http with https

        $wpPost = str_replace( 'http://www.blog.simcoedining.com/wp-content/uploads', 'https://www.blog.simcoedining.com/wp-content/uploads', $wpPost);

        $datetime = $wpPost['date_gmt'];

        $time = Time::createFromFormat(
            'Y-m-d\TH:i:s', // \T is from WordPress GMT format
            $datetime,
            'UTC'
        );

        $blogTime = $time->nice('America/Toronto', 'en-EN');

        // grab the rest from the blog table

        $this->loadModel('Blogs');

        $result =  $this->Blogs->findByWordpress_guid($slug)->first()->toArray(); // should check for flag_published


        if ($result) {
            $wpPost['blog_lead'] = $result['blog_lead'];
            $wpPost['seo_desc'] = $result['seo_desc'];

            if ( $result['social_image_url'] ) {
                $wpPost['social_image_url'] = $result['social_image_url'];
            } else {
                $wpPost['social_image_url'] = $result['title_image_url'];
            }

            $wpPost['title'] = $result['name']; // overrights WP title
            // title_image_url -> use on homepage
        }




       // debug($wpPosts); exit();

        // 1. get http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?orderby=date&order=desc&per_page=4&category=2 (2= barrie, 4 results, incl. acf fields)

        // 2. filter into output results

        $canonical = Configure::read('siteUrlFull');

        $canonicalPath = $canonical. '/blog/' . $wpPost['slug'];

        $this->viewBuilder()->setLayout('default-public');
        $this->set( compact('wpPost', 'blogTime', 'canonicalPath'));

    }

}
