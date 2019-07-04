<?php
namespace App\Controller\Admin;

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
        $this->Auth->allow(['index', 'edit', 'add', 'delete', 'view']);
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


}
