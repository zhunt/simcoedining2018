<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Intersections Controller
 *
 * @property \App\Model\Table\IntersectionsTable $Intersections
 *
 * @method \App\Model\Entity\Intersection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IntersectionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $intersections = $this->paginate($this->Intersections);

        $this->set(compact('intersections'));
    }

    /**
     * View method
     *
     * @param string|null $id Intersection id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intersection = $this->Intersections->get($id, [
            'contain' => ['Cities', 'Venues']
        ]);

        $this->set('intersection', $intersection);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $intersection = $this->Intersections->newEntity();
        if ($this->request->is('post')) {
            $intersection = $this->Intersections->patchEntity($intersection, $this->request->getData());
            if ($this->Intersections->save($intersection)) {
                $this->Flash->success(__('The intersection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intersection could not be saved. Please, try again.'));
        }
        $cities = $this->Intersections->Cities->find('list', ['limit' => 200]);
        $this->set(compact('intersection', 'cities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Intersection id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $intersection = $this->Intersections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intersection = $this->Intersections->patchEntity($intersection, $this->request->getData());
            if ($this->Intersections->save($intersection)) {
                $this->Flash->success(__('The intersection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The intersection could not be saved. Please, try again.'));
        }
        $cities = $this->Intersections->Cities->find('list', ['limit' => 200]);
        $this->set(compact('intersection', 'cities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Intersection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $intersection = $this->Intersections->get($id);
        if ($this->Intersections->delete($intersection)) {
            $this->Flash->success(__('The intersection has been deleted.'));
        } else {
            $this->Flash->error(__('The intersection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
