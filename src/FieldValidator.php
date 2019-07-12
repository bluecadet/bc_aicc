<?php

namespace Drupal\bc_aicc;

class FieldValidator {

  protected $fields = [
    'list_string' => [
      'module' => 'options',
    ],
    'string' => [
      'module' => '',
    ],
    'string_long' => [
      'module' => '',
    ],
    'text' => [
      'module' => '',
    ],
    'text_long' => [
      'module' => '',
    ],
    'link' => [
      'module' => 'link',
    ],
    'entity_reference' => [
      'module' => '',
    ],
    'entity_reference_revisions' => [
      'module' => 'entity_reference_revisions',
    ],
    'datetime' => [
      'module' => 'datetime',
    ],
    'daterange' => [
      'module' => 'datetime_range',
    ],
    'boolean' => [
      'module' => '',
    ],
    'list_float' => [
      'module' => 'options',
    ],
    'list_integer' => [
      'module' => 'options',
    ],
    'decimal' => [
      'module' => '',
    ],
    'float' => [
      'module' => '',
    ],
    'integer' => [
      'module' => '',
    ],
    'name' => [
      'module' => 'name',
    ],
    'viewsreference' => [
      'module' => 'viewsreference',
    ],
    'image' => [
      'module' => 'image',
    ],
    'file' => [
      'module' => 'file',
    ],
    'email' => [
      'module' => '',
    ],
    'telephone' => [
      'module' => 'telephone',
    ],
    'address' => [
      'module' => 'address',
    ],
    'address_country' => [
      'module' => 'address',
    ],
    'address_zone' => [
      'module' => 'address',
    ],
    'color_field_type' => [
      'module' => 'color_field',
    ],
  ];

  public function validateFields($data) {
    drupal_set_message("Starting Field Validation");
    ksm($data);

    $acceptable_field_types = array_keys($this->fields);
    $moduleHandler = \Drupal::service('module_handler');

    foreach ($data['stats']['field_types'] as $field_type) {
      if (!in_array($field_type, $acceptable_field_types)) {
        throw new \Exception('Not an acceptable field type: ' . $field_type);
      }

      if (!empty($this->fields[$field_type]['module'])) {
        ksm($this->fields[$field_type]['module']);
        if (!$moduleHandler->moduleExists($this->fields[$field_type]['module'])) {
          throw new \Exception('Field type, ' . $field_type . ', requires module ' . $this->fields[$field_type]['module']);
        }
      }
    }
  }

}
