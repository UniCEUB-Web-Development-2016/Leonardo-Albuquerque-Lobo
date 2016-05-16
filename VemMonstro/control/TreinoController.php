<?php

include_once "model/Request.php";
include_once "model/Treino.php";
include_once "database/DatabaseConnector.php";

class TreinoController
{
	public function register($request)
	{
		$params = $request->get_params();
		$treino = new Treino($params["nme_treino"],
				 $params["cod_tipo_treino"],
				 $params["info_treino"],
				 $params["sex_treino"]);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "3306", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($treino));	
	}

	private function generateInsertQuery($treino)
	{
		$query =  "INSERT INTO treino (nme_treino, cod_tipo_treino, info_treino, sex_treino) VALUES ('".$treino->getNmeTreino()."','".
					$treino->getCodTipoTreino()."','".
					$treino->getInfoTreino()."','".
					$treino->getSexTreino()."','"."')";

		return $query;						
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT nme_treino, cod_tipo_treino, info_treino, sex_treino FROM treino WHERE ".$crit);

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