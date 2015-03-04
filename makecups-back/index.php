<?php
require 'vendor/autoload.php';
require 'src/infrastructure/ClubeRepositoryImp.php';


$app = new \Slim\Slim();

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/clubes', function () {
	
	$clubeRepository = new ClubeRepositoryImp();
	$listClube = $clubeRepository->getAll();
	
	var_dump(array_values($listClube));
	echo "<br><br>";
	var_dump($listClube);
	
	echo json_encode(array_values($listClube));
});
	

$app->run();