<?php

namespace Drupal\marca_favorita\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements plugin "marca_favorita_widget_type"
 *
 * @FieldWidget(
 *   id = "marca_favorita_widget_type",
 *   label = @Translation("Marca Favorita - Widget"),
 *   description = @Translation("Marca favorita - Widget"),
 *   field_types = {
 *     "marca_favorita_field_type",
 *   },
 *   multiple_values = TRUE,
 * )
 */
class MarcaFieldWidget extends WidgetBase{

    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
        $element += [
            "#type" => "textfield",
            "#default_value" => isset($items[$delta]->value) ? $items[$delta]->value : '',
            "#title" => $this->t('Ingresa tu Marca Favorita'),
            "#element_validate" => [
                [static::class, "validate"]
            ]
        ];

        return ['value' => $element];
    }

    /**
     * Validates the field "marca_field"
     *
     * @param $element
     * @param FormStateInterface $form_state
     * @return void
     */
    public static function validate($element, FormStateInterface $form_state){

    }
}
