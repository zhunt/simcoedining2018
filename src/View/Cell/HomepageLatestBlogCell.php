<?php
namespace App\View\Cell;

use Cake\View\Cell;

use Cake\Http\Client;
use Cake\Utility\Text;

/**
 * HomepageLatestBlog cell
 */
class HomepageLatestBlogCell extends Cell
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
        $http = new Client();

        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?_embed=1&per_page=2 <-- get latest 2 posts with extra data
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?categories=2&_embed=1 <-- get latest posts in category 2
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?tags=9 <-- get latest posts with tag
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?tags=9,10 <-- get latest posts with tags
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?tags_slug=barrie
        // http://localhost:8090/webroot/admin-wordpress/wp-json/acf/v3/posts/12 <-- ACF fields for a post
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?orderby=modified <-- get most recently updated (incl. ACF fields)
        // http://localhost:8090/webroot/admin-wordpress/wp-json/wp/v2/posts?orderby=modified&order=asc <-- order by asc/desc (desc is default)

        // new: http://www.blog.simcoedining.com/wp-json/wp/v2/posts

        //$url = 'http://www.blog.simcoedining.com/wp-json/wp/v2/posts/?per_page=3';

        $response = $http->get('http://www.blog.simcoedining.com/wp-json/wp/v2/posts/', ['per_page' => 4 ]);

        if ( $response->isOk() ) {
            $json = $response->getJson();

           //debug($json);
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
