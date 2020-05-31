<?php

namespace Drupal\marca_favorita\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;


/**
 * Implements plugin 'marca_favorita_formatter_type'
 *
 * @FieldFormatter(
 *   id = "marca_favorita_formatter_type",
 *   label = @Translation("Marca Favorita - Formatter"),
 *   description = @Translation("Marca Favorita - Formatter"),
 *   field_types = {
 *     "marca_favorita_field_type",
 *   }
 * )
 */
class MarcaFieldFormatter extends FormatterBase{

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
