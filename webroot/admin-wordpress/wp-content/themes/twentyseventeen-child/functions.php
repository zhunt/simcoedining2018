<?php

// e.g. http://localhost:8090/webroot/admin-wordpress/wp-json/mytwentyseventeentheme/v1/latest-posts/2
add_action('rest_api_init', function () {
    register_rest_route( 'mytwentyseventeentheme/v1', 'latest-posts/(?P<category_id>\d+)',array(
        'methods'  => 'GET',
        'callback' => 'get_latest_posts_by_category'
    ));
});



function get_latest_posts_by_category($request) {

    $args = array(
        'category' => $request['category_id'],
        'orderby' => 'date',
        'order'=> 'DESC', // most recent first
        'posts_per_page' => 1 // number of posts to return
    );

    $posts = get_posts($args);
    if (empty($posts)) {
        return new WP_Error( 'empty_category', 'there is no post in this category', array('status' => 404) );

    }

      // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );



    //var_dump($posts);

    $response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}


// -------------------
/*
function qod_remove_extra_data( $data, $post, $context ) {  var_dump('here 1');
    // We only want to modify the 'view' context, for reading posts
    if ( $context !== 'view' || is_wp_error( $data ) ) {
        return $data;
    }

    // Here, we unset any data we don't want to see on the front end:
    unset( $data['author'] );
    unset( $data['status'] );


    // continue unsetting whatever other fields you want

    return $data;
}

add_filter( 'json_prepare_post', 'qod_remove_extra_data', 12, 3 );
*/
