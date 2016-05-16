<?php

class Exercicio
{
	private $nme_exericio;
	private $cod_idt_musculo;
	private $cam_img_exericio;
	

	public function __construct($nme_exericio, $cod_idt_musculo, $cam_img_exericio)
	{
		$this->nme_exericio = $nme_exericio;
		$this->cod_idt_musculo = $cod_idt_musculo;
		$this->cam_img_exericio = $cam_img_exericio;
		
	}

	public function getNmeExercicio()
	{
		return $this->nme_exericio;
	}

	public function getCodIdtMusculo()
	{
		return $this->cod_idt_musculo;
	}

	public function getCamImgExercicio()
	{
		return $this->cam_img_exericio;
	}

	}