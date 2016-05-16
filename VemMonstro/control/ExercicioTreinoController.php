<?php

include_once "model/Request.php";
include_once "model/ExercicioTreino.php";
include_once "database/DatabaseConnector.php";

class ExercicioTreinoController
{
	public function register($request)
	{
		$params = $request->get_params();
		$exericioTreino = new ExercicioTreino($params["cod_idt_exercicio"],
				 $params["cod_idt_treino"],
				 $params["dia_treino"]);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "3306", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($exercicioTreino));	
	}

	private function generateInsertQuery($exercicioTreino)
	{
		$query =  "INSERT INTO exercicioTreino (cod_idt_exercicio, cod_idt_treino, dia_treino) VALUES ('".$exercicioTreino->getCodIdtExercicio()."','".
					$exercicioTreino->getCodIdtTreino()."','".
					$exercicioTreino->getDiaTreino()."','"."')";

		return $query;						
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "bd_fit", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT cod_idt_exercicio, cod_idt_treino, dia_treino FROM exercicioTreino WHERE ".$crit);

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