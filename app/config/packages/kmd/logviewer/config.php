<?php

return [

    'base_url'   => 'a/logviewer',
    'filters'    => [
        'global' => ['before' => 'l4-lock.auth'],
        'view'   => ['before' => 'l4-lock.auth'],
        'delete' => ['before' => 'l4-lock.auth'],
    ],
    'log_dirs'   => ['app' => storage_path().'/logs'],
    'log_order'  => 'desc', // Change to 'desc' for the latest entries first
    'per_page'   => 10,
    'view'       => 'logviewer::viewer',
    'p_view'     => 'pagination::slider',

];
