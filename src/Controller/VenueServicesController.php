<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VenueServices Controller
 *
 * @property \App\Model\Table\VenueServicesTable $VenueServices
 *
 * @method \App\Model\Entity\VenueService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VenueServicesController extends AppController
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
        $venueServices = $this->paginate($this->VenueServices);

        $this->set(compact('venueServices'));
    }

    /**
     * View method
     *
     * @param string|null $id Venue Service id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venueService = $this->VenueServices->get($id, [
            'contain' => ['VenueTypes', 'Venues']
        ]);

        $this->set('venueService', $venueService);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venueService = $this->VenueServices->newEntity();
        if ($this->request->is('post')) {
            $venueService = $this->VenueServices->patchEntity($venueService, $this->request->getData());
            if ($this->VenueServices->save($venueService)) {
                $this->Flash->success(__('The venue service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue service could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueServices->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueServices->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueService', 'venueTypes', 'venues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venueService = $this->VenueServices->get($id, [
            'contain' => ['Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venueService = $this->VenueServices->patchEntity($venueService, $this->request->getData());
            if ($this->VenueServices->save($venueService)) {
                $this->Flash->success(__('The venue service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue service could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueServices->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueServices->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueService', 'venueTypes', 'venues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venueService = $this->VenueServices->get($id);
        if ($this->VenueServices->delete($venueService)) {
            $this->Flash->success(__('The venue service has been deleted.'));
        } else {
            $this->Flash->error(__('The venue service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
