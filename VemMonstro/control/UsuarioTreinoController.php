<?php

include_once "model/Request.php";
include_once "model/UsuarioTreino.php";
include_once "database/DatabaseConnector.php";

class UsuarioTreinoController
{
	public function register($request)
	{
		$params = $request->get_params();
		$usuarioTreino = new UsuarioTreino($params["cod_idt_usuario"],
				 $params["cod_idt_treino"]);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "3306", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($usuarioTreino));	
	}

	private function generateInsertQuery($usuarioTreino)
	{
		$query =  "INSERT INTO usuarioTreino (cod_idt_usuario, cod_idt_treino) VALUES ('".$usuarioTreino->getCodIdtUsuario()."','".
					$exercicioTreino->getCodIdtTreino()."','"."')";

		return $query;						
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT cod_idt_usuario, cod_idt_treino FROM usuarioTreino WHERE ".$crit);

		//foreach($result as $row) 

		return $result->fetchAll(PDO::FETCH_ASSOC);

	}

	private function generateCriteria($params) 
	{
		$criteria = "";
		foreach($params as $key => $value)
		{
			$criteria = $criteria.$key." LIKE '%".$value."%' OR ";
		}

		return substr($criteria, 0, -4);	
	}
}