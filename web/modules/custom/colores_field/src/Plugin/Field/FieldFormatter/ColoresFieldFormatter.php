<?php

namespace Drupal\colores_field\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;


/**
 * Implements plugin 'colores_field_formatter_type'
 *
 * @FieldFormatter(
 *   id = "colores_field_formatter_type",
 *   label = @Translation("Colores Field - Formatter"),
 *   description = @Translation("Colores Field - Formatter"),
 *   field_types = {
 *     "colores_field_type",
 *   }
 * )
 */
class ColoresFieldFormatter extends FormatterBase{

    public function viewElements(FieldItemListInterface $items, $langcode)
    {
        $elements = [];
        foreach($items as $delta => $item){
            $elements[$delta] = [
                "value" => [
                    "#markup" => $this->viewValue($item)
                ]
            ];
        }

        return $elements;
    }

    /**
     * Generate the output
     *
     * @param FieldItemInterface $item
     * @return void
     */
    private function viewValue(FieldItemInterface $item){

        return nl2br(Html::escape($item->value));
    }
}
