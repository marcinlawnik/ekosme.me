<?php

return [

    /*
     * Enable or disable the lock here.
     */
    'enabled' => true,

    /*
     * Enforce the lock across the entire site. If you'd rather enable
     * the lock selectively, disable this config option and apply
     * the l4-lock.auth filter on whichever routes you want locked.
     */
    'global' => false,

    /*
     * Here you can provide a list of regex URI patterns that will be excluded
     * from the global filter. These are checked against the actual URI so
     * so to exclude 'http://domain/thing/*', you would add an exception
     * for '/thing\/.*?/'.
     */
    'exceptions' => [
        // Route exception patterns go here
    ],

    /*
     * Some parameters to use for the session.
     */
    'session' => [
        'key' => 'l4-lock',
    ],

    /*
     * This refers to the app binding for the validator class that should
     * be used to validate usernames and passwords.
     */
    'validator' => 'l4-lock.validator',

    /*
     * Valid username and password combinations used by the default validator.
     */
    'users' => [
        $_ENV['lock.username'] => $_ENV['lock.password'],
    ],

    /*
     * View that will be used for the login screen and related paramters.
     */
    'views' => [
        // The layout to use for the login screen
        'layout' => 'l4-lock::layout',
        // The section to put the login form inside the template
        'section' => 'content',
        // The view for the login screen
        'login' => 'l4-lock::login',
        // Title for the form legend
        'title' => 'DOSTĘP OGRANICZONY',
        // Prompt displayed on the login form
        'prompt' => 'Dostęp ograniczony. Zaloguj się, by koontynuować.',
        // Use this to add a foot note to the login screen if desired, you can also
        // specify the name of a partial here and it will be rendered for you.
        // e.g. - contact abc@xyz.com for support.
        'foot-note' => 'Kontakt: marcin@lawniczak.me',
    ],

    /*
     * URLs that lock will respond with / use.
     */
    'urls' => [
        'login'  => 'a/login',
        'logout' => 'a/logout',
    ],

];
