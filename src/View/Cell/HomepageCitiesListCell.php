<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * HomepageCitiesList cell
 */
class HomepageCitiesListCell extends Cell
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
    public function display()
    {
        // load list of cities for a province

        $this->loadModel('Cities');

        // note: cities are not linked directly to province
        $citiesList = $this->Cities->find('list', [
            'keyField' => 'slug',
            'valueField' => 'name',
                'conditions' => [
                   // 'Cities.region_id' => 1
                ],
                'order' => 'name ASC']
        )->toArray();

        $totalCities = sizeof($citiesList);
        $citiesList = $this->partition($citiesList, 3);

        $this->set('citiesList', $citiesList, 'totalCities', $totalCities );
    }

    // from: http://php.net/manual/en/function.array-chunk.php#75022

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
