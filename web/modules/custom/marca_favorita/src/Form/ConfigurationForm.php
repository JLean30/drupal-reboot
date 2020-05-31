<?php

namespace Drupal\marca_favorita\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigurationForm extends ConfigFormBase
{

	/**
	 * {@inheritdoc}
	 */
	public function getFormId()
	{
		return 'marca_favorita.configuration_form';
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state)
	{
		$form = parent::buildForm($form, $form_state);

		$config = $this->config('marca_favorita.configuration');

		$form['marca_favorita'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Ingrese su marca favorita'),
			'#default_value' => $config->get('marca_favorita'),
			'#size' => 64,
			'#maxlength' => 64,
		];

		return $form;
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array &$form, FormStateInterface $form_state)
	{
		// TODO: Validar que el campo no sea vacío
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state)
	{
		$this->config('marca_favorita.configuration')
			->set('marca_favorita', $form_state->getValue('marca_favorita'))
			->save();

		return parent::submitForm($form, $form_state);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getEditableConfigNames()
	{
		return [
			'marca_favorita.configuration'
		];
	}
}
