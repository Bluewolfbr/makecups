<?php
require 'vendor/autoload.php';
require 'src/infrastructure/ClubeRepositoryImp.php';
require 'src/infrastructure/CampeonatoRepositoryImp.php';
require 'src/domain/entity/Usuario.php';
require 'src/domain/entity/campeonato/Campeonato.php';


require 'src/domain/entity/Clube.php';

require 'src/domain/entity/campeonato/Jogador.php';
require 'src/application/CampeonatoApplication.php';


require 'src/domain/entity/Liga.php';
require 'src/domain/repository/IJogadorRepository.php';

$app = new \Slim\Slim ();
$app->response ()->header ( 'Content-Type', 'application/json;charset=utf-8' );

$app->campeonatoBuilder = function() {
	return new CampeonatoBuilderImpl();
};

$app->clubeRepository = function () {
	return new ClubeRepositoryImp ();
};

$app->campeonatoRepository = function () {
	return new CampeonatoRepositoryImp();
};

$app->campeonatoApplication = function (){
	return new CampeonatoApplication();
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
			$clube = $clubeRepository->getById ( $id );

			echo json_encode ( $clube );
		} );
	} );

	$app->group ( "/campeonatos", function () use ($app) {

		$app->post( '/', function () use ($app){
			
			$usuario = new Usuario();
			$usuario->setLogin($app->request->headers->get('Php-Auth-User'));
			$usuario->setSenha($app->request->headers->get('Php-Auth-Pw'));
			
			$dados = json_decode($app->request->getBody());

			$campeonatoApplication = $app->campeonatoApplication;
			$campeonatoApplication->setDados($dados);
			$campeonatoApplication->setCampeonatoRepository($app->campeonatoRepository);
			$campeonatoApplication->setClubeRepository($app->clubeRepository);

			$campeonato = $campeonatoApplication->post();
				 

		 	$app->response->headers->set('Location', 'http://localhost/makecups/makecups-back/v1/campeonatos/' . $campeonato->getId());
			
		});
		
		$app->get ( '/', function () use ($app) {
			$usuario = new Usuario();
			$usuario->setLogin($app->request->headers->get('Php-Auth-User'));
			$usuario->setSenha($app->request->headers->get('Php-Auth-Pw'));

			$campeonatoRepository = $app->campeonatoRepository;
			$campeonatos = $campeonatoRepository->getCampeonatos($usuario);

			echo json_encode ($campeonatos);
		} );

		$app->get ( '/:id', function ($id) use ($app) {

			$campeonatoRepository = $app->campeonatoRepository;
			$campeonato = $campeonatoRepository->getById($id);

			echo json_encode ($campeonato);

			
		} );
	} );
} );

$app->run ();
