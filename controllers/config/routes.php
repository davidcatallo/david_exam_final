<?php

$routes = new Router;

$routes->get('/abonnes',                'AbonnesController@index');
$routes->get('/abonnes/(\d+)',          'AbonnesController@show');
$routes->get('/abonnes/add',            'AbonnesController@add');
$routes->post('/abonnes/save',          'AbonnesController@save');
$routes->get('/abonnes/(\d+)/edit',     'AbonnesController@edit');
$routes->get('/abonnes/(\d+)/delete',   'AbonnesController@delete');

$routes->get('/',  'PagesController@home');

$routes->run();