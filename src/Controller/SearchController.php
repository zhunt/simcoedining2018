<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 *
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchController extends AppController
{

    public $paginate = [
        // Other keys here.
        'maxLimit' => 100,
        'limit' => 10
    ];


    public function beforeFilter(Event $event)
    {
        // allow these actions to run without being logged-in
        $this->Auth->allow(['index', 'search']);
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }


    public function index()
    {
        $this->loadModel('Venues');
        $newVenues = $this->Venues->getNewestVenues(); //debug($newVenues->toArray());


        // todo? process into a json array


        // debug( $citiesList->toArray() );

        $this->viewBuilder()->setLayout('default-public');

        $this->set( compact( 'newVenues') );
    }

    public function search()
    {
        $this->loadModel('Cities');
        $this->loadModel('Venues');
        $this->loadModel('VenueProducts');
        $this->loadModel('VenueServices');

        $searchParamCity = null;

        $cities = $this->Cities->getCitiesWithVenues(); //debug($citiesList);
        $productsList = $this->VenueProducts->getProductsWithVenues(); //debug( $productsList );
        $servicesList = $this->VenueServices->getServicesWithVenues(); //debug( $servicesList );

        $newVenues = $this->Venues->getNewestVenues(); //debug($newVenues->toArray());

        $this->viewBuilder()->setLayout('default-public');

        $this->set( compact( 'cities', 'productsList', 'servicesList', 'newVenues') );

        $conditions = ['Venues.publish_state_id' => 3, 'Venues.venue_closed' => false ]; // store our where conditions

        $seoTags = [];

        $query = $this->Venues->find();

/*
        $seoText = [];
        $seoText['term'] = null;
        $searchTerm = array();
*/
        // check if city/city_region/neighbourhood/etc passed in
        if ( $this->request->getQuery('city') ) {
            $slug = $this->request->getQuery('city'); // debug('$slug: ' . $slug);
            $result = $this->Venues->Cities->find()->where(['slug' => $slug])->first();
            $cityId = $result->id; // debug( $cityId);
            $seoTags[] = $result['name'];

            $searchParamCity = [ 'name' => $result['name'], 'slug' => $slug ];

            $conditions[] = ['Venues.city_id' => $cityId];
        }

        if ( $this->request->getQuery('chain') ) {
            $slug = $this->request->getQuery('chain');
            $result = $this->Venues->Chains->find()->where(['slug' => $slug])->first();
            $chainId = $result->id; // debug( $chainId);
            $seoTags[] = $result['name'];

            $conditions[] = ['Venues.chain_id' => $chainId];
        }

        if ( $this->request->getQuery('product') ) {
            $slug = $this->request->getQuery('product');
            $result = $this->Venues->VenueProducts->find()->where(['slug' => $slug])->first();
            $seoTags[] = $result['name'];

            $query->matching('VenueProducts', function ($q) use ($slug){
                return $q->where(['VenueProducts.slug' => $slug ] );
            });
        }

        if ( $this->request->getQuery('service') ) {
            $slug = $this->request->getQuery('service'); // debug($slug);
            $result = $this->Venues->VenueServices->find()->where(['slug' => $slug])->first();
            $seoTags[] = $result['name'];

            $query->matching('VenueServices', function ($q) use ($slug){
                return $q->where(['VenueServices.slug' => $slug] );  // http://localhost:8085/search/service=pc-repair
            });
        }
        if ( $this->request->getQuery('amenity') ) {
            $slug = $this->request->getQuery('amenity'); // debug($slug);
            $result = $this->Venues->VenueAmenities->find()->where(['slug' => $slug])->first();
            $seoTags[] = $result['name'];

            $query->matching('VenueAmenities', function ($q) use ($slug){
                return $q->where(['VenueAmenities.slug' => $slug] );  // http://localhost:8085/search/service=pc-repair
            });
        }

        if ( $this->request->getQuery('store-type') ) {
            $slug = $this->request->getQuery('store-type'); // debug($slug);
            $result = $this->Venues->VenueTypes->find()->where(['slug' => $slug])->first();
            $seoTags[] = $result['name'];

            $query->matching('VenueTypes', function ($q) use ($slug){
                return $q->where(['VenueTypes.slug' => $slug] );  // http://localhost:8085/search/service=pc-repair
            });
        }

        if ( $this->request->getQuery('neighbourhood') ) {
            $slug = $this->request->getQuery('neighbourhood'); // debug($slug);
            $result = $this->Venues->CityNeighbourhoods->find()->where(['slug' => $slug])->first();
            $seoTags[] = $result['name'];

            $query->matching('CityNeighbourhoods', function ($q) use ($slug){
                return $q->where(['CityNeighbourhoods.slug' => $slug] );  // http://localhost:8085/search/service=pc-repair
            });
        }

        $query->where($conditions)->contain(['Cities'])->order('Venues.name ASC');

// searchParamCity
// debug($seoTags);

        if ( empty($seoTags) ) return $this->redirect('/');

        //$venues = $this->paginate($query);
        //$this->set(compact('venues'));

        $this->set( compact( 'seoTags'));

        try {
            $venues = $this->paginate($query);
            $this->set(compact('venues', 'searchParamCity' ));
        } catch (NotFoundException $e) {
            // Do something here like redirecting to first or last page.
            // $this->request->getParam('paging') will give you required info.
            return $this->redirect('/');

        }

        // example: http://localhost:8085/search?city=chilliwack&product=apple-hardware&service=pc-repair
    }


}