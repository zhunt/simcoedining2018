<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VenueSubTypes Controller
 *
 * @property \App\Model\Table\VenueSubTypesTable $VenueSubTypes
 *
 * @method \App\Model\Entity\VenueSubType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VenueSubTypesController extends AppController
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
        $venueSubTypes = $this->paginate($this->VenueSubTypes);

        $this->set(compact('venueSubTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Venue Sub Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venueSubType = $this->VenueSubTypes->get($id, [
            'contain' => ['VenueTypes', 'Venues']
        ]);

        $this->set('venueSubType', $venueSubType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venueSubType = $this->VenueSubTypes->newEntity();
        if ($this->request->is('post')) {
            $venueSubType = $this->VenueSubTypes->patchEntity($venueSubType, $this->request->getData());
            if ($this->VenueSubTypes->save($venueSubType)) {
                $this->Flash->success(__('The venue sub type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue sub type could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueSubTypes->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueSubTypes->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueSubType', 'venueTypes', 'venues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue Sub Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venueSubType = $this->VenueSubTypes->get($id, [
            'contain' => ['Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venueSubType = $this->VenueSubTypes->patchEntity($venueSubType, $this->request->getData());
            if ($this->VenueSubTypes->save($venueSubType)) {
                $this->Flash->success(__('The venue sub type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue sub type could not be saved. Please, try again.'));
        }
        $venueTypes = $this->VenueSubTypes->VenueTypes->find('list', ['limit' => 200]);
        $venues = $this->VenueSubTypes->Venues->find('list', ['limit' => 200]);
        $this->set(compact('venueSubType', 'venueTypes', 'venues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue Sub Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venueSubType = $this->VenueSubTypes->get($id);
        if ($this->VenueSubTypes->delete($venueSubType)) {
            $this->Flash->success(__('The venue sub type has been deleted.'));
        } else {
            $this->Flash->error(__('The venue sub type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
