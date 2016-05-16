<?php

class UsuarioTreino
{
	private $cod_idt_usuario;
	private $cod_idt_treino;
	

	public function __construct($cod_idt_usuario, $cod_idt_treino)
	{
		$this->cod_idt_usuario = $cod_idt_usuario;
		$this->cod_idt_treino = $cod_idt_treino;
		
	}

	public function getCodIdtUsuario()
	{
		return $this->cod_idt_usuario;
	}

	public function getCodIdtTreino()
	{
		return $this->cod_idt_treino;
	}

	}