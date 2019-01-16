<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VenueProducts Controller
 *
 * @property \App\Model\Table\VenueProductsTable $VenueProducts
 *
 * @method \App\Model\Entity\VenueProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VenueProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['VenueTypes']
        ];
        $venueProducts = $this->paginate($this->VenueProducts);

        $this->set(compact('venueProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Venue Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venueProduct = $this->VenueProducts->get($id, [
            'contain' => ['VenueTypes', 'Venues']
        ]);

        $this->set('venueProduct', $venueProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venueProduct = $this->VenueProducts->newEntity();
        if ($this->request->is('post')) {
            $venueProduct = $this->VenueProducts->patchEntity($venueProduct, $this->request->getData());
            if ($this->VenueProducts->save($venueProduct)) {
                $this->Flash->success(__('The venue product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue product could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueProducts->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueProducts->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueProduct', 'venueTypes', 'venues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venueProduct = $this->VenueProducts->get($id, [
            'contain' => ['Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venueProduct = $this->VenueProducts->patchEntity($venueProduct, $this->request->getData());
            if ($this->VenueProducts->save($venueProduct)) {
                $this->Flash->success(__('The venue product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue product could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueProducts->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueProducts->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueProduct', 'venueTypes', 'venues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venueProduct = $this->VenueProducts->get($id);
        if ($this->VenueProducts->delete($venueProduct)) {
            $this->Flash->success(__('The venue product has been deleted.'));
        } else {
            $this->Flash->error(__('The venue product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
