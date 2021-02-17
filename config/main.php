<?php

return [
	'db' => [
		'dsn' => 'mysql:dbname=dz4;host=127.0.0.1',
        'user' => 'root',
        'pass' => 'password',
  ],
  'templates' => __DIR__ .'/../templates',
  'routing' => [
  	'login' => 'users/login',
  	'logout' => 'users/logout',
  	'basket' => 'users/basket',
    'order' => 'users/order',
  	'catalog\/([0-9]+)\/([0-9]+)' => 'catalog/good',
  	'catalog\/([0-9]+)' => 'catalog/category',
  	'catalog' => 'catalog/index',
  	'pages\/(.*)' => 'pages/index',
  	'(\w+)\/(\w+)' => '<controller>/<action>',
  	'(\w+)' => '<controller>/index',
  	'^$' => 'index/index',
  	'(.*)' => 'index/error',
  ],
];