<?php

$config = array(

    'base'     => '/',
    'baseurl'  => '/',
    'database' => array(
        'host' => 'localhost',
        'name' => 'test',
        'user' => 'root',
        'pass' => ''
    )

);

$config['defaults'] = array(

    'session' => array(
        'expiry'         => 86400,
        'probability'    => 1,
        'divisor'        => 100
    ),
        
    'caching' => array(
        'status' => false,
        'expiry' => 604800
    ),
    
    'page_caching' => array(
        'status' => false,
        'expiry' => 604800
    ),
    
    'fragment_caching' => array(
        'status' => false,
        'expiry' => 604800
    ),
    
    'page' => array(
        'title'               => 'Telescope Schedules',
        'meta-description'    => 'Telescope Schedules',
        'h1'                  => 'Telescope Schedules',
        'css'                 => array(
            'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css',
            $config['base'] . 'css/bootstrap.min.css'
        ),
        'js'                  => array(
            'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
            'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js',
            $config['base'] . 'js/bootstrap.min.js'
        )
    )
    
);

/* 
    Return the $config becuase this file will be loaded as an array
    and used in the config class
*/
return $config;