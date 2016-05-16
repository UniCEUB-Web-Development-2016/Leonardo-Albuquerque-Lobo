<?php

include_once "model/Request.php";
include_once "model/Exercicio.php";
include_once "database/DatabaseConnector.php";

class ExercicioController
{
	public function register($request)
	{
		$params = $request->get_params();
		$exercicio = new Exercicio($params["nme_exercicio"],
				 $params["cod_idt_musculo"],
				 $params["cam_img_exercicio"]);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "3306", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($exercicio));	
	}

	private function generateInsertQuery($exercicio)
	{
		$query =  "INSERT INTO exercicio (nme_exercicio, cod_idt_musculo, cam_img_exercicio) VALUES ('".$exercicio->getNmeExercicio()."','".
					$exercicio->getCodIdtMusculo()."','".
					$exercicio->getCamImgExercicio()."','"."')";

		return $query;						
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT nme_exercicio, cod_idt_musculo, cam_img_exercicio FROM exercicio WHERE ".$crit);

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