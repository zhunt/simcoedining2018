<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * HomepageCityVenueTypes cell
 */
class HomepageCityVenueTypesCell extends Cell
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
    public function display($data, $id) {
        $this->loadModel('VenueTypes');

        $venueTypeList = $this->VenueTypes->getVenueTypesWithVenues($cityId = $id )->toArray();

        // get the first 5
        $top5 = array_slice($venueTypeList, 0, 5);

        $rest = array_slice($venueTypeList, 5);

        // sort the 2nd array alphabetically
        usort($rest, function($a, $b) {
            return strcmp ($a['name'], $b['name']);
        });

        // ... and recombine the 2 arrays
        $venueTypeList = array_merge($top5,$rest);

        // get city and province name for header
        $city = $data['name'];  $citySlug = $data['slug'];
        $province = $data['region']['province']['name'];

        $venueTypeList = $this->partition($venueTypeList, 3);

        $this->set( compact('venueTypeList', 'city', 'citySlug', 'province'));
    }

    private function partition( $list, $p ) {
        $listlen = count( $list );
        $partlen = floor( $listlen / $p );
        $partrem = $listlen % $p;
        $partition = array();
        $mark = 0;
        for ($px = 0; $px < $p; $px++) {
            $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
            $partition[$px] = array_slice( $list, $mark, $incr );
            $mark += $incr;
        }
        return $partition;
    }


}
