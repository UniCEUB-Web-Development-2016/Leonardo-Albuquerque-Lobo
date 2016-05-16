<?php

class Treino
{
	private $nme_treino;
	private $cod_tipo_treino;
	private $info_treino;
	private $sex_treino;
	

	public function __construct($nme_treino, $cod_tipo_treino, $info_treino, $sex_treino)
	{
		$this->nme_treino = $nme_treino;
		$this->cod_tipo_treino = $cod_tipo_treino;
		$this->info_treino = $info_treino;
		$this->sex_treino = $sex_treino;
		
	}

	public function getNmeTreino()
	{
		return $this->nme_treino;
	}

	public function getCodTipoTreino()
	{
		return $this->cod_tipo_treino;
	}

	public function getInfoTreino()
	{
		return $this->info_treino;
	}

	public function getSexTreino()
	{
		return $this->sex_treino;
	}

	}