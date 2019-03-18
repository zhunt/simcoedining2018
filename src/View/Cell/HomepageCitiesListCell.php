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
    public function display($provinceIds = [4] ) // [4,1], 4 = BC, Ontario
    {
        // load list of cities for a province

        $this->loadModel('Cities');
        $this->loadModel('Provinces');

        $provincesList = [];

        foreach ( $provinceIds as $provinceId) {
            $regions = $this->Provinces->Regions->find('all', [
                'conditions' => ['province_id' => $provinceId] ] )
                ->contain( ['Provinces' => ['fields' => ['name'] ] ] );

            //debug( $regions);

            foreach( $regions as $region) { // debug($region);

                $regionId = $region->id;

                $provinceId = $region->province_id;

                $provinceName = $region->province->name;

                // get current list of regions
                $regionsList = [];
                if ( isset($provincesList[$provinceId]['regions'] ) ) {
                    $regionsList = $provincesList[$provinceId]['regions'];
                    array_push( $regionsList, $regionId );
                } else {
                    $regionsList[] = $regionId;
                }

                $provincesList[ $provinceId] = [
                    'id' => $provinceId,
                    'name' => $provinceName,
                    'regions' => $regionsList
                ];
            }



        }

        //debug($provincesList);

        //debug($region->toArray() );

        $citiesList = []; $fullCitiesList =[];

        foreach ( $provincesList as $province ) { // debug($province);

            $regionsList = $province['regions']; //debug($regionsList);

            // note: cities are not linked directly to province
            $citiesList = $this->Cities->find('list', [
                    'keyField' => 'slug',
                    'valueField' => 'name',
                    'conditions' => [
                        'Cities.region_id IN' => $regionsList,
                        'Cities.venue_count >' => 0
                    ],
                    'order' => 'name ASC']
            )->toArray();


            $totalCities = sizeof($citiesList);
            $citiesList = $this->partition($citiesList, 3);

            $fullCitiesList[$province['name']] = $citiesList;
            $citiesList = [];

        }


//debug($fullCitiesList);

        $this->set( compact( 'citiesList', 'totalCities', 'fullCitiesList') );// , $citiesList, 'totalCities', $totalCities, $fullCitiesList );
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
