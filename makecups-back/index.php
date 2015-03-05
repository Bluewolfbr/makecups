<?php
require 'vendor/autoload.php';
require 'src/infrastructure/ClubeRepositoryImp.php';

$app = new \Slim\Slim ();
$app->response ()->header ( 'Content-Type', 'application/json;charset=utf-8' );

$app->clubeRepository = function () {
	return new ClubeRepositoryImp ();
};

$app->group ( "/v1", function () use($app) {
	
	$app->get ( '/hello/:name', function ($name) {
		echo "Hello, $name";
	} );
	
	$app->group ( "/clubes", function () use($app) {
		
		$app->get ( '/', function () use($app) {
			
			$clubeRepository = $app->clubeRepository;
			$clubes = $clubeRepository->getAll ();
			
			echo json_encode ( $clubes );
		} );
		
		$app->get ( '/:id', function ($id) use($app) {
			
			$clubeRepository = $app->clubeRepository;
			$clube = $clubeRepository->getById($id);
			
			echo json_encode ($clube);
		} );
	} );
} );

$app->run ();

