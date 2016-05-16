<?php

class TipoTreino
{
	private $nme_tipo_treino;
		

	public function __construct($nme_tipo_treino)
	{
		$this->nme_tipo_treino = $nme_tipo_treino;
				
	}

	public function getNmeTipoTreino()
	{
		return $this->nme_tipo_treino;
	}

	}