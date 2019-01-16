<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * HomepageCityProducts cell
 */
class HomepageCityProductsCell extends Cell
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
        $this->loadModel('VenueProducts');
       // $this->loadModel('VenueServices');

        $cuisinesList = $this->VenueProducts->getProductsWithVenues($cityId = $id )->toArray();

        $city = $data['name'];  $citySlug = $data['slug'];
        $province = $data['region']['province']['name'];

        $cuisinesList = $this->partition($cuisinesList, 3);

        $this->set( compact('cuisinesList', 'city', 'citySlug', 'province'));
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
