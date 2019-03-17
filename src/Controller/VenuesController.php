<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Venues Controller
 *
 * @property \App\Model\Table\VenuesTable $Venues
 *
 * @method \App\Model\Entity\Venue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VenuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Regions', 'Cities', 'CityRegions', 'CityNeighbourhoods', 'Intersections', 'PublishStates', 'Chains', 'ClientTypes'],
            'limit' => 200,
            'maxLimit' => 200
        ];
        $venues = $this->paginate($this->Venues);

        $this->set(compact('venues'));
    }

    /**
     * View method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => ['Regions', 'Cities', 'CityRegions', 'CityNeighbourhoods', 'Intersections', 'PublishStates', 'Chains', 'ClientTypes', 'VenueAmenities', 'VenueProducts', 'VenueServices', 'VenueSubtypes', 'VenueTypes']
        ]);

        $this->set('venue', $venue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venue = $this->Venues->newEntity();
        if ($this->request->is('post')) {
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());
            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $regions = $this->Venues->Regions->find('list', ['limit' => 200, 'groupField' => 'province.name' ])->contain(['Provinces']);
        $cities = $this->Venues->Cities->find('list', ['limit' => 200]);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200]);
        $cityNeighbourhoods = $this->Venues->CityNeighbourhoods->find('list', ['limit' => 200]);
        $intersections = $this->Venues->Intersections->find('list', ['limit' => 200]);
        $publishStates = $this->Venues->PublishStates->find('list', ['limit' => 200]);
        $chains = $this->Venues->Chains->find('list', ['limit' => 200]);
        $clientTypes = $this->Venues->ClientTypes->find('list', ['limit' => 200]);
        $venueAmenities = $this->Venues->VenueAmenities->find('list', ['limit' => 200]);
        $venueProducts = $this->Venues->VenueProducts->find('list', ['limit' => 200]);
        $venueServices = $this->Venues->VenueServices->find('list', ['limit' => 200]);
        $venueSubtypes = $this->Venues->VenueSubtypes->find('list', ['limit' => 200]);
        $venueTypes = $this->Venues->VenueTypes->find('list', ['limit' => 200]);
        $this->set(compact('venue', 'regions', 'cities', 'cityRegions', 'cityNeighbourhoods', 'intersections', 'publishStates', 'chains', 'clientTypes', 'venueAmenities', 'venueProducts', 'venueServices', 'venueSubtypes', 'venueTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => ['VenueAmenities', 'VenueProducts', 'VenueServices', 'VenueSubtypes', 'VenueTypes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());
            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $regions = $this->Venues->Regions->find('list', ['limit' => 200, 'groupField' => 'province.name' ])->contain(['Provinces']);
        $cities = $this->Venues->Cities->find('list', ['limit' => 200]);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200]);
        $cityNeighbourhoods = $this->Venues->CityNeighbourhoods->find('list', ['limit' => 200]);
        $intersections = $this->Venues->Intersections->find('list', ['limit' => 200]);
        $publishStates = $this->Venues->PublishStates->find('list', ['limit' => 200]);
        $chains = $this->Venues->Chains->find('list', ['limit' => 200]);
        $clientTypes = $this->Venues->ClientTypes->find('list', ['limit' => 200]);
        $venueAmenities = $this->Venues->VenueAmenities->find('list', ['limit' => 200]);
        $venueProducts = $this->Venues->VenueProducts->find('list', ['limit' => 200]);
        $venueServices = $this->Venues->VenueServices->find('list', ['limit' => 200]);
        $venueSubtypes = $this->Venues->VenueSubtypes->find('list', ['limit' => 200]);
        $venueTypes = $this->Venues->VenueTypes->find('list', ['limit' => 200]);
        $this->set(compact('venue', 'regions', 'cities', 'cityRegions', 'cityNeighbourhoods', 'intersections', 'publishStates', 'chains', 'clientTypes', 'venueAmenities', 'venueProducts', 'venueServices', 'venueSubtypes', 'venueTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venue = $this->Venues->get($id);
        if ($this->Venues->delete($venue)) {
            $this->Flash->success(__('The venue has been deleted.'));
        } else {
            $this->Flash->error(__('The venue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
