<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BlogsVenues Controller
 *
 * @property \App\Model\Table\BlogsVenuesTable $BlogsVenues
 *
 * @method \App\Model\Entity\BlogsVenue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogsVenuesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Blogs', 'Venues']
        ];
        $blogsVenues = $this->paginate($this->BlogsVenues);

        $this->set(compact('blogsVenues'));
    }

    /**
     * View method
     *
     * @param string|null $id Blogs Venue id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogsVenue = $this->BlogsVenues->get($id, [
            'contain' => ['Blogs', 'Venues']
        ]);

        $this->set('blogsVenue', $blogsVenue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogsVenue = $this->BlogsVenues->newEntity();
        if ($this->request->is('post')) {
            $blogsVenue = $this->BlogsVenues->patchEntity($blogsVenue, $this->request->getData());
            if ($this->BlogsVenues->save($blogsVenue)) {
                $this->Flash->success(__('The blogs venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blogs venue could not be saved. Please, try again.'));
        }
        $blogs = $this->BlogsVenues->Blogs->find('list', ['limit' => 200]);
        $venues = $this->BlogsVenues->Venues->find('list', ['limit' => 200]);
        $this->set(compact('blogsVenue', 'blogs', 'venues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blogs Venue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogsVenue = $this->BlogsVenues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogsVenue = $this->BlogsVenues->patchEntity($blogsVenue, $this->request->getData());
            if ($this->BlogsVenues->save($blogsVenue)) {
                $this->Flash->success(__('The blogs venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blogs venue could not be saved. Please, try again.'));
        }
        $blogs = $this->BlogsVenues->Blogs->find('list', ['limit' => 200]);
        $venues = $this->BlogsVenues->Venues->find('list', ['limit' => 200]);
        $this->set(compact('blogsVenue', 'blogs', 'venues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blogs Venue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogsVenue = $this->BlogsVenues->get($id);
        if ($this->BlogsVenues->delete($blogsVenue)) {
            $this->Flash->success(__('The blogs venue has been deleted.'));
        } else {
            $this->Flash->error(__('The blogs venue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
