<?php

include_once "model/Request.php";
include_once "model/Musculo.php";
include_once "database/DatabaseConnector.php";

class MusculoController
{
	public function register($request)
	{
		$params = $request->get_params();
		$musculo = new Musculo($params["nme_musculo"]);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "3306", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($musculo));	
	}

	private function generateInsertQuery($musculo)
	{
		$query =  "INSERT INTO musculo (nme_musculo) VALUES ('".$musculo->getNmeMusculo()."','"."')";

		return $query;						
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT nme_musculo FROM musculo WHERE ".$crit);

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