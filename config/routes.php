<?php

$routes = new Router;

$routes->get('/conducteurs',                'ConducteursController@index');
$routes->get('/conducteurs/add',            'ConducteursController@add');
$routes->get('/conducteurs/(\d+)',          'ConducteursController@show');
$routes->post('/conducteurs/save',          'ConducteursController@save');
$routes->get('/conducteurs/(\d+)/edit',     'ConducteursController@edit');
$routes->get('/conducteurs/(\d+)/delete',   'ConducteursController@delete');

$routes->get('/vehicules',                  'VehiculesController@index');
$routes->get('/vehicules/add',              'VehiculesController@add');
$routes->get('/vehicules/(\d+)',            'VehiculesController@show');
$routes->post('/vehicules/save',            'VehiculesController@save');
$routes->get('/vehicules/(\d+)/edit',       'VehiculesController@edit');
$routes->get('/vehicules/(\d+)/delete',     'VehiculesController@delete');

$routes->get('/associations',                'AssociationsController@index');
$routes->get('/associations/add',            'AssociationsController@add');
$routes->get('/associations/(\d+)',          'AssociationsController@show');
$routes->post('/associations/save',          'AssociationsController@save');
$routes->get('/associations/(\d+)/edit',     'AssociationsController@edit');
$routes->get('/associations/(\d+)/delete',   'AssociationsController@delete');

$routes->get('/',  'PagesController@home');
$routes->get('/divers',  'PagesController@divers');

$routes->run();