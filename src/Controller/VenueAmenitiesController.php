<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VenueAmenities Controller
 *
 * @property \App\Model\Table\VenueAmenitiesTable $VenueAmenities
 *
 * @method \App\Model\Entity\VenueAmenity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VenueAmenitiesController extends AppController
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
        $venueAmenities = $this->paginate($this->VenueAmenities);

        $this->set(compact('venueAmenities'));
    }

    /**
     * View method
     *
     * @param string|null $id Venue Amenity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venueAmenity = $this->VenueAmenities->get($id, [
            'contain' => ['VenueTypes', 'Venues']
        ]);

        $this->set('venueAmenity', $venueAmenity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venueAmenity = $this->VenueAmenities->newEntity();
        if ($this->request->is('post')) {
            $venueAmenity = $this->VenueAmenities->patchEntity($venueAmenity, $this->request->getData());
            if ($this->VenueAmenities->save($venueAmenity)) {
                $this->Flash->success(__('The venue amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue amenity could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueAmenities->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueAmenities->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueAmenity', 'venueTypes', 'venues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue Amenity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venueAmenity = $this->VenueAmenities->get($id, [
            'contain' => ['Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venueAmenity = $this->VenueAmenities->patchEntity($venueAmenity, $this->request->getData());
            if ($this->VenueAmenities->save($venueAmenity)) {
                $this->Flash->success(__('The venue amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue amenity could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueAmenities->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueAmenities->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueAmenity', 'venueTypes', 'venues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue Amenity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venueAmenity = $this->VenueAmenities->get($id);
        if ($this->VenueAmenities->delete($venueAmenity)) {
            $this->Flash->success(__('The venue amenity has been deleted.'));
        } else {
            $this->Flash->error(__('The venue amenity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
