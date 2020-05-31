<?php

namespace Drupal\marca_favorita\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Bloque de marca
 *
 * @Block(
 *   id = "marca_block",
 *   admin_label = @Translation("Bloque de la marca favorita"),
 * )
 */
class MarcaBlock extends BlockBase implements ContainerFactoryPluginInterface
{

	/**
	 * @var AccountProxyInterface
	 */
	protected $current_user;

	/**
	 *@var ConfigFactory
	 */
	protected $config_factory;

	public function __construct(
		array $configuration,
		$plugin_id,
		$plugin_definition,
		AccountProxyInterface $current_user,
		ConfigFactory $config_factory
	) {
		parent::__construct($configuration, $plugin_id, $plugin_definition);

		$this->current_user = $current_user;
		$this->config_factory = $config_factory;
	}

	/**
	 * @param ContainerInterface $container
	 * @param array $configuration
	 * @param string $plugin_id
	 * @param mixed $plugin_definition
	 * @return static
	 */
	public static function create(
		ContainerInterface $container,
		array $configuration,
		$plugin_id,
		$plugin_definition
	) {
		return new static(
			$configuration,
			$plugin_id,
			$plugin_definition,
			$container->get('current_user'),
			$container->get('config.factory')
		);
	}

	public function build()
	{
		$build = [];
		$config = $this->config_factory->get('marca_favorita.configuration');
		$build['marca_block'] = [
			'#markup' => $this->t("Hola! @user, tu marca favorita es: @marca", [
				'@user' => $this->current_user->getAccountName(),
				'@marca' => $config->get('marca_favorita')
			]),
		];

		return $build;
	}
}
