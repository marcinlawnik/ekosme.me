<?php

return array(

    'base_url'   => 'a/logviewer',
    'filters'    => array(
        'global' => array('before' => 'l4-lock.auth'),
        'view'   => array('before' => 'l4-lock.auth'),
        'delete' => array('before' => 'l4-lock.auth')
    ),
    'log_dirs'   => array('app' => storage_path().'/logs'),
    'log_order'  => 'desc', // Change to 'desc' for the latest entries first
    'per_page'   => 10,
    'view'       => 'logviewer::viewer',
    'p_view'     => 'pagination::slider'

);
