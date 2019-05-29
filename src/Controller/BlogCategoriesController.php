<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BlogCategories Controller
 *
 * @property \App\Model\Table\BlogCategoriesTable $BlogCategories
 *
 * @method \App\Model\Entity\BlogCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $blogCategories = $this->paginate($this->BlogCategories);

        $this->set(compact('blogCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Blog Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogCategory = $this->BlogCategories->get($id, [
            'contain' => ['Blogs']
        ]);

        $this->set('blogCategory', $blogCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogCategory = $this->BlogCategories->newEntity();
        if ($this->request->is('post')) {
            $blogCategory = $this->BlogCategories->patchEntity($blogCategory, $this->request->getData());
            if ($this->BlogCategories->save($blogCategory)) {
                $this->Flash->success(__('The blog category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog category could not be saved. Please, try again.'));
        }
        $blogs = $this->BlogCategories->Blogs->find('list', ['limit' => 200]);
        $this->set(compact('blogCategory', 'blogs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogCategory = $this->BlogCategories->get($id, [
            'contain' => ['Blogs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogCategory = $this->BlogCategories->patchEntity($blogCategory, $this->request->getData());
            if ($this->BlogCategories->save($blogCategory)) {
                $this->Flash->success(__('The blog category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blog category could not be saved. Please, try again.'));
        }
        $blogs = $this->BlogCategories->Blogs->find('list', ['limit' => 200]);
        $this->set(compact('blogCategory', 'blogs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogCategory = $this->BlogCategories->get($id);
        if ($this->BlogCategories->delete($blogCategory)) {
            $this->Flash->success(__('The blog category has been deleted.'));
        } else {
            $this->Flash->error(__('The blog category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
