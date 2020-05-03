<?php

namespace Drupal\color_favorito\Controller;

class ColorFavoritoController
{
	public function index()
	{
		// TODO: Mostrar el color favorito acá
		return [
			'#theme' => 'color_favorito',
			'#title' => 'Muestra tu color favorito',
			'#color' => 'Azul'
		];
	}
}
