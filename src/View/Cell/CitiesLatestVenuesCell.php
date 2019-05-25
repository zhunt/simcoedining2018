<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CitiesLatestVenues cell
 */
class CitiesLatestVenuesCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($data, $id)
    {

        $this->loadModel('Venues');

        // based on the passed-in newest_venue_types, show from those

        if ( $data['newest_venue_types'] && strpos( $data['newest_venue_types'], ',') ) {
            $venueTypes  = explode( ',', $data['newest_venue_types']);
        } else {
            // if empty, show newest restaurants and bars
            $venueTypes = [4,5];
        }

        //debug($venueTypes);

        $city = $data['name'];  $citySlug = $data['slug'];
        $province = $data['region']['province']['name'];

        // look up for each and assign to array with keys of that type and slug (for search on More link)

        // build up an array like:
        /*
         * 1 => [
         *  'title' => 'New Restaurants',
         *  'srcset_images' => [ '400w' => '...', '600w' => '...', ],
         *  'venues' => [ '<a href=#'>aaa</a>', '...' ]
         * ],
         * 2 => [
         *  .....
         *
         */

        $newVenues = [];

        foreach ( $venueTypes as $veneTypeId) {

            // get the header image

            $headerImages = [];
            $title = '';

            switch($veneTypeId) {
                case 4:
                    $headerImages = $this->getHeaderImage('restaurant');
                    $title = 'Restaurants';
                    $venueTypeSlug = 'restaurant';
                    $venues = $this->Venues->getNewestVenuesForCity($id, 4)->toArray();
                    break;
                case 5:
                    $headerImages = $this->getHeaderImage('bar');
                    $title = 'Bars';
                    $venueTypeSlug = 'bar';
                    $venues = $this->Venues->getNewestVenuesForCity($id, 5)->toArray();
                    break;

                case 10:
                    $headerImages = $this->getHeaderImage('cafe');
                    $title = 'Cafes';
                    $venueTypeSlug = 'cafe';
                    $venues = $this->Venues->getNewestVenuesForCity($id, 10)->toArray();
                    break;

                case 8:
                    $headerImages = $this->getHeaderImage('nightclub');
                    $title = 'Nightclubs';
                    $venueTypeSlug = 'night-club';
                    $venues = $this->Venues->getNewestVenuesForCity($id, 8)->toArray();
                    break;

                case 6:
                    $headerImages = $this->getHeaderImage('hotel');
                    $title = 'Hotels';
                    $venueTypeSlug = 'hotel';
                    $venues = $this->Venues->getNewestVenuesForCity($id, 6)->toArray();
                    break;


                    // etc...
/*
                default:
                    $headerImages = $this->getHeaderImage('restaurant');
                    $venues = $this->Venues->getNewestVenuesForCity($id, 4)->toArray();
*/
            }


            /* add this code after venue title when built:
             <small class="text-muted newest-venues-types" style="
    background-color: #0d47a1;
    color: white !important;
    padding: 0.125rem .25rem;
    opacity: .5;
">Italian</small>

             * */

            $venuesList = [];
            if ($venues) {
                foreach ($venues as $venue) {
                    $venuesList[ $venue['id'] ] = "
                        <a class=\"newest-venues-title\" href=\"/{$venue['city']['slug']}/{$venue['slug']}\">{$venue['name']}</a>
                        
                        <br>
                        <small class=\"text-muted\">{$venue['address']}</small>";
                }
            } else {
                $venuesList = [0 => 'No Venues'];
            }


            $newVenues[] = [
                'title' => $title,
                'srcset_images' => $headerImages,
                'venues' => $venuesList,
                'city_slug' => $citySlug,
                'venue_type' => $venueTypeSlug
                ];

            //debug($newVenues);
        }

        $this->set( compact( 'city', 'citySlug', 'province', 'newVenues'));
    }


    function getHeaderImage( $type = 'restaurant' ) {

        // $imageParams = '/c_fill,f_auto,g_center,q_auto,w_400/';

        $headers = [
            'restaurant' => [
                '400w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_center,q_auto,w_400/v1558497688/blur-close-up-cutlery-370984_hfqhhp.jpg',
                '800w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_center,q_auto,w_800/v1558497688/blur-close-up-cutlery-370984_hfqhhp.jpg',
                '1200w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_center,q_auto,w_1200/v1558497688/blur-close-up-cutlery-370984_hfqhhp.jpg'
            ],
            'bar' => [
                '400w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_400/v1558497690/alcohol-ale-bar-159291_evczoe.jpg',
                '800w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_800/v1558497690/alcohol-ale-bar-159291_evczoe.jpg',
                '1200w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_1200/v1558497690/alcohol-ale-bar-159291_evczoe.jpg'
            ],
            'cafe' => [
                '400w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_400/v1558497691/aroma-aromatic-art-434213_ohzqlk.jpg',
                '800w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_800/v1558497691/aroma-aromatic-art-434213_ohzqlk.jpg',
                '1200w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_1200/v1558497691/aroma-aromatic-art-434213_ohzqlk.jpg'
            ],
            'nightclub' => [
                '400w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_400/v1558497691/audience-club-dark-2114365_oryjjs.jpg',
                '800w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_800/v1558497691/audience-club-dark-2114365_oryjjs.jpg',
                '1200w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_1200/v1558497691/audience-club-dark-2114365_oryjjs.jpg'
            ],
            'hotel' => [
                '400w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_400/v1558582614/bed-bedroom-cozy-164595_o0qfx4.jpg',
                '800w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_800/v1558582614/bed-bedroom-cozy-164595_o0qfx4.jpg',
                '1200w' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/c_fill,f_auto,g_auto,q_auto,w_1200/v1558582614/bed-bedroom-cozy-164595_o0qfx4.jpg'
            ],
            // add more types here
        ];

        return ( $headers[$type]);
    }
}
