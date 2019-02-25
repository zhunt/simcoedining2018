<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Http\Client;
use Cake\Utility\Text;

/**
 * CitiesLatestBlog cell
 */
class CitiesLatestBlogCell extends Cell
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
    public function display( $city, $cityId)
    {
        $http = new Client();

        $wpCategoryId = 0;

        // TODO: move this value into database later (in $city table)
        switch($cityId) {
            case 33:
                $wpCategoryId = 9; // BARRIE_ONTARIO
                break;

            default:
                $wpCategoryId = 10; // VENUE_REVIEW
        }

        $response = $http->get('http://www.blog.simcoedining.com/wp-json/wp/v2/posts/', ['per_page' => 4, 'categories' => $wpCategoryId ]);

        if ( $response->isOk() ) {
            $json = $response->getJson();

           // debug($json);
            $wpPosts = [];
            foreach ($json as $row ) {
                $wpPosts[] = [
                    'id' => $row['id'],
                    'title' => $row['title']['rendered'],
                    'slug' => $row['slug'],
                    'date_gmt' => $row['date_gmt'],
                    'image_url' => $row['acf']['home_page_image'],
                    'excerpt' => strip_tags($row['excerpt']['rendered']) // => Text::stripLinks($row['excerpt']['rendered']) // a href=\"http://blog.simcoedining.com/simcoe-hospitality-awards-2015/\">Continue reading <span class=\"meta-nav\">&rarr;</span></a>
                ];
            }
        } else {
            $wpPosts = [ 0 => 'No blog found.'];
        }

        //debug($wpPosts);

        // 1. get http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?orderby=date&order=desc&per_page=4&category=2 (2= barrie, 4 results, incl. acf fields)

        // 2. filter into output results

        $this->set( compact('wpPosts'));
    }
}
