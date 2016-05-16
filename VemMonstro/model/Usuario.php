<?php

class Usuario
{
	private $nme_usuario;
	private $last_nme_usuario;
	private $email_usuario;
	private $senha_usuario;
	private $dta_nasc_usuario;
	private $sex_usuario;

	public function __construct($nme_usuario, $last_nme_usuario,$email_usuario, $senha_usuario, $dta_nasc_usuario, $sex_usuario)
	{
		$this->nme_usuario = $nme_usuario;
		$this->last_nme_usuario = $last_nme_usuario;
		$this->email_usuario = $email_usuario;
		$this->senha_usuario = $senha_usuario;
		$this->dta_nasc_usuario = $dta_nasc_usuario;
		$this->sex_usuario = $sex_usuario;
	}

	public function getNmeUsuario()
	{
		return $this->nme_usuario;
	}

	public function getLastnmeUsuario()
	{
		return $this->last_nme_usuario;
	}

	public function getEmailUsuario()
	{
		return $this->email_usuario;
	}

	public function getSenhaUsuario()
	{
		return $this->senha_usuario;
	}

	public function getDtanascUsuario()
	{
		return $this->dta_nasc_usuario;
	}

	public function getSexUsuario()
	{
		return $this->sex_usuario;
	}

}