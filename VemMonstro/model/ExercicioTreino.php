<?php

class ExercicioTreino
{
	private $cod_idt_exercicio;
	private $cod_idt_treino;
	private $dia_treino;
	

	public function __construct($cod_idt_exercicio, $cod_idt_treino, $dia_treino)
	{
		$this->cod_idt_exercicio = $cod_idt_exercicio;
		$this->cod_idt_treino = $cod_idt_treino;
		$this->dia_treino = $dia_treino;
		
	}

	public function getCodIdtExercicio()
	{
		return $this->cod_idt_exercicio;
	}

	public function getCodIdtTreino()
	{
		return $this->cod_idt_treino;
	}

	public function getDiaTreino()
	{
		return $this->dia_treino;
	}

	}