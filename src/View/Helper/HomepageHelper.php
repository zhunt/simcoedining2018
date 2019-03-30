<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

// need this to access bootstrap config
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

/**
 * Homepage helper
 */
class HomepageHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html'];

    // outputs a list of cities with venue count and with links to the city page
    public function citiesList($cityList, $maxNumber = 1000 )
    {
        $html = '<ul class="list-inline">';
        $counter = 0;
        foreach ($cityList as $city) {

            if ( $counter >= $maxNumber ) {
                $html .= "<li class=\"list-inline-item\"><a href=\"/city/\">More</a></li>";
                break;
            }
            $html .= "<li class=\"list-inline-item\"><a href=\"/search/?city={$city['slug']}\">{$city['name']}</a></li>";
            $counter++;
        }
        $html .= '</ul>';

        return $html;
    }


    // outputs the products and services mixed together
    public function productServiceList($products, $services, $maxNumber) {
        $html = '<ul class="list-inline">';
        $counter = 0;
        foreach ($products as $product) {

            if ( $counter >= $maxNumber ) {
                $html .= "<li class=\"list-inline-item\"><a href=\"/product/\">More Products</a></li>";
                break;
            }
            $html .= "<li class=\"list-inline-item\"><a href=\"/search/?product={$product['slug']}\">{$product['name']}</a> ({$product['total_venues']})</li>";
            $counter++;
        }
        $html .= '</ul>';

        $html .= '<ul class="list-inline">';
        $counter = 0;
        foreach ($services as $service) {

            if ( $counter >= $maxNumber ) {
                $html .= "<li class=\"list-inline-item\"><a href=\"/service/\">More Services</a></li>";
                break;
            }
            $html .= "<li class=\"list-inline-item\"><a href=\"/search/?service={$service['slug']}\">{$service['name']}</a> ({$product['total_venues']})</li>";
            $counter++;
        }

        $html .= '</ul>';

        return $html;
    }

    // display list of newest venues
    public function newestListings($venues)
    {
        $html = '';
        foreach ($venues as $venue) {
            $html .= "
                        <a href=\"/{$venue['city']['slug']}/{$venue['slug']}\"><b>{$venue['name']} {$venue['sub_name']}</b></a><br>
                                    {$venue['address']}<br>
                                    <!-- {$venue['city']['name']}<br> -->
                                    <!-- {$venue['last_verified']} -->
                                    <hr />
                        ";
        }

        return $html;
    }

    public function nearbyListings($venues)
    {
        $html = '';
        foreach ($venues as $venue) {

            $distance = $venue['distance'];
            if ( $distance < 1 ) {
                $distanceText = round(  $distance, 2) * 1000 . ' M';
            } else {
                $distanceText = round(  $distance, 1). ' Km';
            }

            $html .= "
                        <a href=\"/{$venue['city']['slug']}/{$venue['slug']}\"><b>{$venue['name']} {$venue['sub_name']}</b></a><br>
                                    {$venue['address']}<br>
                                    <!-- {$venue['city']['name']}<br> -->
                                    {$distanceText}
                                    <hr />
                        ";
        }

        return $html;
    }

    /*
'name' => 'iRepair',
    'sub_name' => '(Downtown Vancouver)',
    'slug' => 'irepair-vancouver-downtown',
    'address' => '88 W. Pender St.',
    'geo_lat' => (float) 49.280792,
    'geo_lng' => (float) -123.107285,
    'distance' => '4.801386465821398',
*/


    // return a list of items as a link
    public function listOfSubcategories( $category, $citySlug, $urlBase = null) {
        if ( is_array($category) ) {
            $html = '<ul class="list-inline mt-2">';
            foreach ( $category as $i => $row) {
                if ( !empty($urlBase)) {
                    $html .= "<li class=\"list-inline-item\"><a href=\"/search/?{$urlBase}={$row['slug']}&city={$citySlug}\">{$row['name']}</a></li>";
                } else {
                    $html .= '<li class="list-inline-item">' . $row['name'] . '</li>'; // what is this for?
                }
            }

            $html .= '</ul>';
            return $html;
        }

    }

    public function venueMapJS(){
        // $exists = Configure::check('gmapApiKey');

        $html = '<script  async defer src="https://maps.googleapis.com/maps/api/js?key=' . Configure::read('gmapApiKey') .'&libraries=geometry&callback=initMap"></script>';

        return $html;
    }


}
