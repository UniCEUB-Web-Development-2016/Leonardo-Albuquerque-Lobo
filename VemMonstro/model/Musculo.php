<?php

class Musculo
{
	private $nme_musculo;
		

	public function __construct($nme_musculo)
	{
		$this->nme_musculo = $nme_musculo;
				
	}

	public function getNmeMusculo()
	{
		return $this->nme_musculo;
	}

	}