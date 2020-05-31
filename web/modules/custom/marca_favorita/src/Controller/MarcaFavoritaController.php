<?php

namespace Drupal\marca_favorita\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Config\ConfigFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * class Marca Favorita Controller
 */
class MarcaFavoritaController extends ControllerBase {

  /**
	 * @var ConfigFactory
	 */
    protected $config_factory;

	public function __construct(ConfigFactory $config_factory)
	{
        $this->config_factory = $config_factory;
  }
  public static function create(ContainerInterface $container)
	{
    	return new static($container->get('config.factory'));
    }

  /**
   * Index.
   *
   * @return string
   */
  public function index() {
	  $marca = $this->config_factory->get('marca_favorita.configuration')->get('marca_favorita');

    /**
     * <div clase="marca-container">
     *    [items]
     * </div>
     */
    $build = [
      '#prefix' => '<div class="marca-container">',
      '#suffix' => '</div>',
      'items' => [],
      '#attached' => [
        'library'=>[
          'marca_favorita/marca_favorita_js_and_css'
        ]
      ]
    ];

      $build['items'][] = [
        '#theme' => 'marca_favorita',
        '#title' => "Tu Marca Favorita es",
        '@marca' => $marca,
        '#marca' => "@marca",

      ];

    return $build;
  }

}
