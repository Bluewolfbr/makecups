<?php
require 'vendor/autoload.php';
require 'src/infrastructure/ClubeRepositoryImp.php';
require 'src/infrastructure/CampeonatoRepositoryImp.php';
require 'src/domain/entity/Usuario.php';
require 'src/domain/entity/campeonato/Campeonato.php';
require 'src/domain/entity/campeonato/CampeonatoBuilder.php';

$app = new \Slim\Slim ();
$app->response ()->header ( 'Content-Type', 'application/json;charset=utf-8' );

$app->campeonatoBuilder = function() {
	return new CampeonatoBuilderImpl();
}
$app->clubeRepository = function () {
	return new ClubeRepositoryImp ();
};

$app->campeonatoRepository = function () {
	return new CampeonatoRepositoryImp();
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

	$app->group ( "/campeonatos", function () use($app) {

		$app->post( '/', function () use($app){
			$campeonato = ???
			$jogadores = ???
			$times = ???

			$campeonato = Campeonato.builder($campeonato.nome)
				.times($times)
				.jogadores($jogadores)
				.build();

			$repo = $app->campeonatoRepository;
			$campeonato = $repo.save($campeonato);
		});
		$app->get ( '/', function () use($app) {
			$usuario = new Usuario();
			$usuario->setLogin($app->request->headers->get('Php-Auth-User'));
			$usuario->setSenha($app->request->headers->get('Php-Auth-Pw'));

			$campeonatoRepository = $app->campeonatoRepository;
			$campeonatos = $campeonatoRepository->getCampeonatos($usuario);

			echo json_encode ($campeonatos);
		} );

		$app->get ( '/:id', function ($id) use($app) {

			$clubeRepository = $app->clubeRepository;
			$clube = $clubeRepository->getById ( $id );

			echo json_encode ( $clube );
		} );
	} );
} );

$app->run ();
