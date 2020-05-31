<?php

namespace Drupal\marca_favorita\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "marca_favorita_field_type",
 *   label = @Translation("Marca Favorita Field Type"),
 *   description = @Translation("Marca Favorita Field Type"),
 *   default_widget = "marca_favorita_widget_type",
 *   default_formatter = "marca_favorita_formatter_type"
 * )
 */

class MarcaFieldType extends FieldItemBase
{

    /**
     * {@inheritDoc}
     */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['value'] = DataDefinition::create('string')
            ->setLabel(new TranslatableMarkup('Marca Favorita'));

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
                    "length" => "255",
                    "description" => t("Marca Favorita"),
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
