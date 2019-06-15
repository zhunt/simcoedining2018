<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/*
 * IMPORTANT:
 * This is an example configuration file. Copy this file into your config directory and edit to
 * setup your app permissions.
 *
 * This is a quick roles-permissions implementation
 * Rules are evaluated top-down, first matching rule will apply
 * Each line define
 *      [
 *          'role' => 'role' | ['roles'] | '*'
 *          'prefix' => 'Prefix' | , (default = null)
 *          'plugin' => 'Plugin' | , (default = null)
 *          'controller' => 'Controller' | ['Controllers'] | '*',
 *          'action' => 'action' | ['actions'] | '*',
 *          'allowed' => true | false | callback (default = true)
 *      ]
 * You could use '*' to match anything
 * 'allowed' will be considered true if not defined. It allows a callable to manage complex
 * permissions, like this
 * 'allowed' => function (array $user, $role, Request $request) {}
 *
 * Example, using allowed callable to define permissions only for the owner of the Posts to edit/delete
 *
 * (remember to add the 'uses' at the top of the permissions.php file for Hash, TableRegistry and Request
   [
        'role' => ['user'],
        'controller' => ['Posts'],
        'action' => ['edit', 'delete'],
        'allowed' => function(array $user, $role, Request $request) {
            $postId = Hash::get($request->params, 'pass.0');
            $post = TableRegistry::get('Posts')->get($postId);
            $userId = Hash::get($user, 'id');
            if (!empty($post->user_id) && !empty($userId)) {
                return $post->user_id === $userId;
            }
            return false;
        }
    ],
 */

return [
    'CakeDC/Auth.permissions' => [
        //admin role allowed to all the things
        [
            'role' => 'admin',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => '*',
            'action' => '*',
        ],
        //specific actions allowed for the all roles in Users plugin
        [
            'role' => '*',
            'plugin' => 'CakeDC/Users',
            'controller' => 'Users',
            'action' => ['profile', 'logout', 'linkSocial', 'callbackLinkSocial'],
        ],
        [
            'role' => '*',
            'plugin' => 'CakeDC/Users',
            'controller' => 'Users',
            'action' => 'resetGoogleAuthenticator',
            'allowed' => function (array $user, $role, \Cake\Http\ServerRequest $request) {
                $userId = \Cake\Utility\Hash::get($request->getAttribute('params'), 'pass.0');
                if (!empty($userId) && !empty($user)) {
                    return $userId === $user['id'];
                }

                return false;
            }
        ],
        //all roles allowed to Pages/display
        [
            'role' => '*',
            'controller' => 'Pages',
            'action' => 'display',
        ],

        // test for a user of type author
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'Cities',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'CityRegions',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'CityNeighbourhoods',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'Regions',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'Provinces',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'Venues',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'VenueTypes',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'VenueServices',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'VenueAmenities',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'VenueProducts',
            'action' => '*'
        ],
        [
            'role' => 'author',
            'prefix' => 'Admin',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'Blogs',
            'action' => ['index', 'add', 'edit']
        ],
        [
            'role' => 'author',
            'prefix' => '*',
            'extension' => '*',
            'plugin' => '*',
            'controller' => 'BlogCategories',
            'action' => '*'
        ],

        // test for a user of type author
        [
            'role' => 'user',
            'controller' => 'Cities',
            'action' => ['view', 'edit']
        ]

    ]
];
