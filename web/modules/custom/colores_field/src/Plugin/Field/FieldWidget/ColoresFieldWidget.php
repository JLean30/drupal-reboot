<?php

namespace Drupal\colores_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\Unicode;

/**
 * Implements plugin "colores_field_widget_type"
 *
 * @FieldWidget(
 *   id = "colores_field_widget_type",
 *   label = @Translation("Colores Field - Widget"),
 *   description = @Translation("Colores Field - Widget"),
 *   field_types = {
 *     "colores_field_type",
 *   },
 *   multiple_values = TRUE,
 * )
 */
class ColoresFieldWidget extends WidgetBase{

    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
        $element += [
            "#type" => "textfield",
            "#default_value" => isset($items[$delta]->value) ? $items[$delta]->value : '',
            "#title" => $this->t('Escribe el codigo hexadecimal del color'),
            "#maxlength" => 7,
            "#element_validate" => [
                [static::class, "validate"]
            ]
        ];

        return ['value' => $element];
    }

    /**
     * Validates the field "colores_field"
     *
     * @param $element
     * @param FormStateInterface $form_state
     * @return void
     */
    public static function validate($element, FormStateInterface $form_state){
      $value = $element["#value"];
      $valid = is_string($value);
      $value = ltrim($value, '#');
      $length = Unicode::strlen($value);
      $valid = $valid && ($length === 3 || $length === 6);
      $valid = $valid && ctype_xdigit($value);
      if(!$valid){
        $form_state->setError($element,
          t("Has introducido de forma erronea el codigo hexadecimal, revisa la cantidad de digitos")
        );
      }
    }
}
