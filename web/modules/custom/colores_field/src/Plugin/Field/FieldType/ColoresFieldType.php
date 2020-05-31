<?php

namespace Drupal\colores_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "colores_field_type",
 *   label = @Translation("Colores field type"),
 *   description = @Translation("Colores field type"),
 *   default_widget = "colores_field_widget_type",
 *   default_formatter = "colores_field_formatter_type"
 * )
 */

class ColoresFieldType extends FieldItemBase
{

    /**
     * {@inheritDoc}
     */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['value'] = DataDefinition::create('string')
            ->setLabel(new TranslatableMarkup('Color'));

        return $properties;
    }

    /**
     * {@inheritDoc}
     */
    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        $columns = [
            "columns" => [
                "value" => [
                    "type" => "varchar",
                    "length" => "7",
                    "description" => t("Colores field"),
                    "not null" => FALSE
                ]
            ]
        ];

        return $columns;
    }

    /**
     * {@inheritDoc}
     */
    public function isEmpty()
    {
        $value = $this->get('value')->getValue();
        return $value == NULL || $value == '';
    }
}
