<?php

include_once "model/Request.php";
include_once "model/TipoTreino.php";
include_once "database/DatabaseConnector.php";

class TipoTreinoController
{
	public function register($request)
	{
		$params = $request->get_params();
		$tipoTreino = new TipoTreino($params["nme_tipo_treino"]);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "3306", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($tipoTreino));	
	}

	private function generateInsertQuery($tipoTreino)
	{
		$query =  "INSERT INTO tipoTreino (nme_tipo_treino) VALUES ('".$tipoTreino->getNmeTipoTreino()."','"."')";

		return $query;						
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT nme_tipo_treino FROM tipoTreino WHERE ".$crit);

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