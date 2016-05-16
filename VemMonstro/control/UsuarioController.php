<?php

include_once "model/Request.php";
include_once "model/Usuario.php";
include_once "database/DatabaseConnector.php";

class UsuarioController
{
	public function register($request)
	{
		$params = $request->get_params();
		$user = new Usuario($params["nme_usuario"],
				 $params["last_nme_usuario"],
				 $params["email_usuario"],
				 $params["senha_usuario"],
				 $params["dta_nasc_usuario"],
				 $params["sex_usuario"]);

		$db = new DatabaseConnector("127.0.0.1", "facebook", "mysql", "3306", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($user));	
	}

	private function generateInsertQuery($user)
	{
		$query =  "INSERT INTO usuario (nme_usuario, last_nme_usuario, email_usuario, senha_usuario, dta_nasc_usuario, sex_usuario) VALUES ('".$user->getNmeUsuario()."','".
					$user->getLastnmeUsuario()."','".
					$user->getEmailUsuario()."','".
					$user->getSenhaUsuario()."','".
					$user->getDtaNascUsuario()."','". 
					$user->getSexUsuario()."')";

		return $query;						
	}

	public function search($request)
	{	
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("127.0.0.1", "bd_fit", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT nme_usuario, last_nme_usuario, email_usuario, senha_usuario, dta_nasc_usuario, sex_usuario FROM user WHERE ".$crit);

		//foreach($result as $row) 
 		
		return $result->fetch(PDO::FETCH_ASSOC);

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