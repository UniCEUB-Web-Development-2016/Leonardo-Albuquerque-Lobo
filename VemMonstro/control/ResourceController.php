<?php

include_once "model/Request.php";
include_once "control/UsuarioController.php";
include_once "control/ExercicioController.php";
include_once "control/ExercicioTreinoController.php";
include_once "control/MusculoController.php";
include_once "control/TipoTreinoController.php";
include_once "control/TreinoController.php";
include_once "control/UsuarioTreinoController.php";

class ResourceController
{

	private $controlMap = 
	[
		"usuario" => "UsuarioController",
		"exercicio" => "ExercicioController",
		"exercicioTreino" => "ExercicioTreinoController",
		"musculo" => "MusculoController",
		"tipoTreino" => "TipoTreinoController",
		"treino" => "TreinoController",
		"usuarioTreino" => "UsuarioTreinoController"
	];

	public function createResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->register($request);
	}

	public function searchResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->search($request);
	}
}