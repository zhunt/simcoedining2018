<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 *
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomepageController extends AppController {

    public function beforeFilter(Event $event)
    {
        // allow these actions to run without being logged-in
        $this->Auth->allow(['index', 'cityHomepage', 'viewVenue']);
    }

    public function index()
    {

        $this->loadModel('Cities');
        $this->loadModel('Venues');
        $this->loadModel('VenueProducts');
        $this->loadModel('VenueServices');
        /*
                $cities = $this->Cities->getCitiesWithVenues(); //debug($citiesList);
                $productsList = $this->VenueProducts->getProductsWithVenues(); //debug( $productsList );
                $servicesList = $this->VenueServices->getServicesWithVenues(); //debug( $servicesList );

                $newVenues = $this->Venues->getNewestVenues(); //debug($newVenues->toArray());

                $canonical = Configure::read('siteUrlFull');
        */
        $this->viewBuilder()->setLayout('default-public');
/*
        $this->set( compact( 'cities', 'productsList', 'servicesList', 'newVenues', 'canonical') );
*/
    }

    public function cityHomepage($slug) {

        $this->loadModel('Cities');

        $this->loadModel('VenueProducts');
        $this->loadModel('VenueServices');

        // probably going to remove sub-types
        //$this->loadModel('VenueTypes');
        //$venueTypesList = $this->VenueTypes->getVenueTypesWithVenues(1)->toArray();

        // done in Cell now
        //$cuisinesList = $this->VenueProducts->getProductsWithVenues($cityId = 1 )->toArray();

        $city = $this->Cities->find('all', [
            'conditions' => ['Cities.slug' => $slug],
            'contain' => ['Regions' => [ 'Provinces' ] ]
        ])->first(); // debug($cityData);

        $this->viewBuilder()->setLayout('default-public');
        $this->set( compact( 'city', 'cuisinesList') );
    }


    public function viewVenue($slug, $citySlug) {  // debug($slug); debug($citySlug);

        $slug = filter_var($slug, FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW|FILTER_FLAG_ENCODE_HIGH );

        $this->viewBuilder()->setLayout('default-public');
        $this->loadModel('Venues');

        $venue = $this->Venues->find('all',
            ['conditions' => [ 'Venues.slug' => $slug, 'Venues.publish_state_id' => 3 ] ])
           ->contain([ 'VenueSubtypes', 'VenueProducts', 'VenueServices', 'Cities']) //  fix these: 'Intersections', 'Chains' 'CityRegions', 'CityNeighbourhoods'
            ->first(); // debug($venue->toArray() );

        if (!$venue) {
            $this->redirect('/');
        }
//debug($venue);
//        debug( " $venue->geo_lat, $venue->geo_lat, $venue->id");

        $nearbyVenues = $this->Venues->getNearbyVenues($venue->geo_lat, $venue->geo_lng, $venue->id);

        $newVenues = $this->Venues->getNewestVenues();

        $canonical = Configure::read('siteUrlFull') . '/' . $venue->slug;

        $this->set( compact(  'newVenues', 'venue', 'nearbyVenues', 'canonical') );

    }

}