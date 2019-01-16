<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CityNeighbourhoods Controller
 *
 * @property \App\Model\Table\CityNeighbourhoodsTable $CityNeighbourhoods
 *
 * @method \App\Model\Entity\CityNeighbourhood[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CityNeighbourhoodsController extends AppController
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
        $cityNeighbourhoods = $this->paginate($this->CityNeighbourhoods);

        $this->set(compact('cityNeighbourhoods'));
    }

    /**
     * View method
     *
     * @param string|null $id City Neighbourhood id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cityNeighbourhood = $this->CityNeighbourhoods->get($id, [
            'contain' => ['Cities', 'Venues']
        ]);

        $this->set('cityNeighbourhood', $cityNeighbourhood);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cityNeighbourhood = $this->CityNeighbourhoods->newEntity();
        if ($this->request->is('post')) {
            $cityNeighbourhood = $this->CityNeighbourhoods->patchEntity($cityNeighbourhood, $this->request->getData());
            if ($this->CityNeighbourhoods->save($cityNeighbourhood)) {
                $this->Flash->success(__('The city neighbourhood has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city neighbourhood could not be saved. Please, try again.'));
        }
        $cities = $this->CityNeighbourhoods->Cities->find('list', ['limit' => 200]);
        $this->set(compact('cityNeighbourhood', 'cities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id City Neighbourhood id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cityNeighbourhood = $this->CityNeighbourhoods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cityNeighbourhood = $this->CityNeighbourhoods->patchEntity($cityNeighbourhood, $this->request->getData());
            if ($this->CityNeighbourhoods->save($cityNeighbourhood)) {
                $this->Flash->success(__('The city neighbourhood has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city neighbourhood could not be saved. Please, try again.'));
        }
        $cities = $this->CityNeighbourhoods->Cities->find('list', ['limit' => 200]);
        $this->set(compact('cityNeighbourhood', 'cities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id City Neighbourhood id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cityNeighbourhood = $this->CityNeighbourhoods->get($id);
        if ($this->CityNeighbourhoods->delete($cityNeighbourhood)) {
            $this->Flash->success(__('The city neighbourhood has been deleted.'));
        } else {
            $this->Flash->error(__('The city neighbourhood could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
