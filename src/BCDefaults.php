<?php

namespace Drupal\bc_aicc;

use Drupal\paragraphs\Entity\ParagraphsType;

/**
 *
 */
class BCDefaults {

  public $fieldStorageSettingsBase = [
    'entity_type' => '',
    'type' => '',
    'field_name' => '',
    'cardinality' => 1,
    'settings' => [],
  ];

  public $defaultFieldStorageSettings = [
    'node' => [
      'list_string' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'string' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'string_long' => [
        'settings' => [
          'case_sensitive' => FALSE,
        ],
      ],
      'text' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'text_long' => [
        'settings' => [],
      ],
      'link' => [
        'settings' => [],
      ],
      'entity_reference' => [
        'node' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'node',
          ],
        ],
        'taxonomy_term' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'taxonomy_term',
          ],
        ],
        'media' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'media',
          ],
        ],
      ],
      'entity_reference_revisions' => [
        'cardinality' => -1,
        'settings' => [
          'target_type' => 'paragraph',
        ],
      ],
      'datetime' => [
        'cardinality' => 1,
        'settings' => [
          // datetime: Date and time | date: Date only
          'datetime_type' => 'datetime',
        ],
      ],
      'boolean' => [
        'settings' => [],
      ],
      'list_float' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'list_integer' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'decimal' => [
        'settings' => [
          'precision' => 10,
          'scale' => 2,
        ],
      ],
      'float' => [
        'settings' => [],
      ],
      'integer' => [
        'settings' => [
          'unsigned' => FALSE,
          'size' => 'normal',
        ],
      ],
    ],
    'taxonomy_term' => [
      'list_string' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'string' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'string_long' => [
        'settings' => [
          'case_sensitive' => FALSE,
        ],
      ],
      'text' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'text_long' => [
        'settings' => [],
      ],
      'link' => [
        'settings' => [],
      ],
      'entity_reference' => [
        'node' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'node',
          ],
        ],
        'taxonomy_term' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'taxonomy_term',
          ],
        ],
        'media' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'media',
          ],
        ],
      ],
      'entity_reference_revisions' => [
        'cardinality' => -1,
        'settings' => [
          'target_type' => 'paragraph',
        ],
      ],
      'datetime' => [
        'cardinality' => 1,
        'settings' => [
          // datetime: Date and time | date: Date only
          'datetime_type' => 'datetime',
        ],
      ],
      'boolean' => [
        'settings' => [],
      ],
      'list_float' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'list_integer' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'decimal' => [
        'settings' => [
          'precision' => 10,
          'scale' => 2,
        ],
      ],
      'float' => [
        'settings' => [],
      ],
      'integer' => [
        'settings' => [
          'unsigned' => FALSE,
          'size' => 'normal',
        ],
      ],
    ],
    'paragraph' => [
      'list_string' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'string' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'string_long' => [
        'settings' => [
          'case_sensitive' => FALSE,
        ],
      ],
      'text' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'text_long' => [
        'settings' => [],
      ],
      'link' => [
        'settings' => [],
      ],
      'entity_reference' => [
        'node' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'node',
          ],
        ],
        'taxonomy_term' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'taxonomy_term',
          ],
        ],
        'media' => [
          'cardinality' => -1,
          'settings' => [
            'target_type' => 'media',
          ],
        ],
      ],
      'entity_reference_revisions' => [
        'cardinality' => -1,
        'settings' => [
          'target_type' => 'paragraph',
        ],
      ],
      'datetime' => [
        'cardinality' => 1,
        'settings' => [
          // datetime: Date and time | date: Date only
          'datetime_type' => 'datetime',
        ],
      ],
      'boolean' => [
        'settings' => [],
      ],
      'list_float' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'list_integer' => [
        'settings' => [
          'allowed_values' => [],
          'allowed_values_function' => '',
        ],
      ],
      'decimal' => [
        'settings' => [
          'precision' => 10,
          'scale' => 2,
        ],
      ],
      'float' => [
        'settings' => [],
      ],
      'integer' => [
        'settings' => [
          'unsigned' => FALSE,
          'size' => 'normal',
        ],
      ],
    ],
  ];

  public $fieldInstanceSettingsBase = [
    'label' => '',
    'description' => '',
    'required' => FALSE,
  ];

  public $defaultFldInstSetts = [
    'node' => [
      'list_string' => [],
      'string' => [],
      'string_long' => [],
      'text' => [
        'settings' => [],
        'third_party_settings' => [],
      ],
      'text_long' => [
        'settings' => [],
        'third_party_settings' => [],
      ],
      'link' => [
        'settings' => [
          // 1 = Internal Links Only | 16 = External Links only | 17 = Both internal & external.
          'link_type' => 17,
          // 0 = Disabled | 1 = Optional | 2 = Required.
          'title' => 2,
        ],
      ],
      'entity_reference' => [
        'node' => [
          'handler' => 'default:node',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'title',
              'direction' => 'ASC',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
        'taxonomy_term' => [
          'handler' => 'default:taxonomy_term',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'name',
              'direction' => 'ASC',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
        'media' => [
          'handler' => 'default:media',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => '_none',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
      ],
      'entity_reference_revisions' => [
        'handler' => 'default:paragraph',
        'handler_settings' => [
          'negate' => 0,
          'target_bundles' => [],
          'target_bundles_drag_drop' => [],
        ],
      ],
      'datetime' => [],
      'boolean' => [
        'settings' => [
          'on_label' => 'On',
          'off_label' => 'Off',
        ],
      ],
      'list_float' => [],
      'list_integer' => [],
      'decimal' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
      'float' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
      'integer' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
    ],
    'taxonomy_term' => [
      'list_string' => [],
      'string' => [],
      'string_long' => [],
      'text' => [
        'settings' => [],
        'third_party_settings' => [],
      ],
      'text_long' => [
        'settings' => [],
        'third_party_settings' => [],
      ],
      'link' => [
        'settings' => [
          // 1 = Internal Links Only | 16 = External Links only | 17 = Both internal & external.
          'link_type' => 17,
          // 0 = Disabled | 1 = Optional | 2 = Required.
          'title' => 2,
        ],
      ],
      'entity_reference' => [
        'node' => [
          'handler' => 'default:node',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'title',
              'direction' => 'ASC',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
        'taxonomy_term' => [
          'handler' => 'default:taxonomy_term',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'name',
              'direction' => 'ASC',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
        'media' => [
          'handler' => 'default:media',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => '_none',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
      ],
      'entity_reference_revisions' => [
        'handler' => 'default:paragraph',
        'handler_settings' => [
          'negate' => 0,
          'target_bundles' => [],
          'target_bundles_drag_drop' => [],
        ],
      ],
      'datetime' => [],
      'boolean' => [
        'settings' => [
          'on_label' => 'On',
          'off_label' => 'Off',
        ],
      ],
      'list_float' => [],
      'list_integer' => [],
      'decimal' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
      'float' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
      'integer' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
    ],
    'paragraph' => [
      'list_string' => [],
      'string' => [],
      'string_long' => [],
      'text' => [
        'settings' => [],
        'third_party_settings' => [],
      ],
      'text_long' => [
        'settings' => [],
        'third_party_settings' => [],
      ],
      'link' => [
        'settings' => [
          // 1 = Internal Links Only | 16 = External Links only | 17 = Both internal & external.
          'link_type' => 17,
          // 0 = Disabled | 1 = Optional | 2 = Required.
          'title' => 2,
        ],
      ],
      'entity_reference' => [
        'node' => [
          'handler' => 'default:node',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'title',
              'direction' => 'ASC',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
        'taxonomy_term' => [
          'handler' => 'default:taxonomy_term',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'name',
              'direction' => 'ASC',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
        'media' => [
          'handler' => 'default:media',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => '_none',
            ],
            'auto_create' => FALSE,
            'auto_create_bundle' => '',
          ],
        ],
      ],
      'entity_reference_revisions' => [
        'handler' => 'default:paragraph',
        'handler_settings' => [
          'negate' => 0,
          'target_bundles' => [],
          'target_bundles_drag_drop' => [],
        ],
      ],
      'datetime' => [],
      'boolean' => [
        'settings' => [
          'on_label' => 'On',
          'off_label' => 'Off',
        ],
        // 'default_value' => [
        //   [
        //     'value' => 0,
        //   ],
        // ],
      ],
      'list_float' => [],
      'list_integer' => [],
      'decimal' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
      'float' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
      'integer' => [
        'settings' => [
          'min' => null,
          'max' => null,
          'prefix' => '',
          'suffix' => '',
        ],
      ],
    ],
  ];

  public $defaultFieldFormSettings = [
    'node' => [
      'list_string' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'string' => [
        'type' => 'string_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 25,
          'placeholder' => '',
        ],
      ],
      'string_long' => [
        'type' => 'string_textarea',
        'weight' => 0,
        'settings' => [
          'rows' => 5,
          'placeholder' => '',
        ],
      ],
      'text' => [
        'type' => 'text_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 60,
          'placeholder' => '',
        ],
        'third_party_settings' => [
          'allowed_formats' => [
            'hide_help' => 1,
            'hide_guidlines' => 1,
          ],
        ],
      ],
      'text_long' => [
        'type' => 'text_textarea',
        'weight' => 0,
        'settings' => [
          'rows' => 5,
          'placeholder' => '',
        ],
        'third_party_settings' => [
          'allowed_formats' => [
            'hide_help' => 1,
            'hide_guidlines' => 1,
          ],
        ],
      ],
      'link' => [
        'type' => 'link_default',
        'weight' => 0,
        'settings' => [
          'placeholder_url' => '',
          'placeholder_title' => '',
        ],
      ],
      'entity_reference' => [
        'node' => [
          'type' => 'entity_reference_autocomplete',
          'weight' => 0,
          'settings' => [
            'match_operator' => 'CONTAINS',
            'size' => 60,
            'placeholder' => ' ',
          ],
          'third_party_settings' => [],
        ],
        'taxonomy_term' => [
          'type' => 'options_select',
          'weight' => 0,
          'settings' => [],
          'third_party_settings' => [],
        ],
        'media' => [
          'type' => 'inline_entity_form_complex',
          'weight' => 0,
          'settings' => [
            'form_mode' => 'inline_entity_form',
            'override_labels' => TRUE,
            'label_singular' => 'Image',
            'label_plural' => 'Images',
            'collapsible' => TRUE,
            'allow_new' => TRUE,
            'allow_existing' => TRUE,
            'match_operator' => 'CONTAINS',
            'collapsed' => FALSE,
            'allow_duplicate' => FALSE,
          ],
          'third_party_settings' => [],
        ],
      ],
      'entity_reference_revisions' => [
        'type' => 'entity_reference_paragraphs',
        'weight' => 0,
        'settings' => [
          'title' => 'Paragraph',
          'title_plural' => 'Paragraphs',
          'edit_mode' => 'preview',
          'add_mode' => 'dropdown',
          'form_display_mode' => 'default',
          'default_paragraph_type' => '_none',
        ],
      ],
      'datetime' => [
        'type' => 'datetime_default',
        'weight' => 0,
        'settings' => [],
      ],
      'boolean' => [
        'type' => 'boolean_checkbox',
        'weight' => 0,
        'settings' => [
          'display_label' => TRUE,
        ],
        'third_party_settings' => [],
      ],
      'list_float' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'list_integer' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'decimal' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
      'float' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
      'integer' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
    ],
    'taxonomy_term' => [
      'list_string' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'string' => [
        'type' => 'string_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 25,
          'placeholder' => '',
        ],
      ],
      'string_long' => [
        'type' => 'string_textarea',
        'weight' => 0,
        'settings' => [
          'rows' => 5,
          'placeholder' => '',
        ],
      ],
      'text' => [
        'type' => 'text_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 60,
          'placeholder' => '',
        ],
        'third_party_settings' => [
          'allowed_formats' => [
            'hide_help' => 1,
            'hide_guidlines' => 1,
          ],
        ],
      ],
      'text_long' => [
        'type' => 'text_textarea',
        'weight' => 0,
        'settings' => [
          'rows' => 5,
          'placeholder' => '',
        ],
        'third_party_settings' => [
          'allowed_formats' => [
            'hide_help' => 1,
            'hide_guidlines' => 1,
          ],
        ],
      ],
      'link' => [
        'type' => 'link_default',
        'weight' => 0,
        'settings' => [
          'placeholder_url' => '',
          'placeholder_title' => '',
        ],
      ],
      'entity_reference' => [
        'node' => [
          'type' => 'entity_reference_autocomplete',
          'weight' => 0,
          'settings' => [
            'match_operator' => 'CONTAINS',
            'size' => 60,
            'placeholder' => ' ',
          ],
          'third_party_settings' => [],
        ],
        'taxonomy_term' => [
          'type' => 'options_select',
          'weight' => 0,
          'settings' => [],
          'third_party_settings' => [],
        ],
        'media' => [
          'type' => 'inline_entity_form_complex',
          'weight' => 0,
          'settings' => [
            'form_mode' => 'inline_entity_form',
            'override_labels' => TRUE,
            'label_singular' => 'Image',
            'label_plural' => 'Images',
            'collapsible' => TRUE,
            'allow_new' => TRUE,
            'allow_existing' => TRUE,
            'match_operator' => 'CONTAINS',
            'collapsed' => FALSE,
            'allow_duplicate' => FALSE,
          ],
          'third_party_settings' => [],
        ],
      ],
      'entity_reference_revisions' => [
        'type' => 'entity_reference_paragraphs',
        'weight' => 0,
        'settings' => [
          'title' => 'Paragraph',
          'title_plural' => 'Paragraphs',
          'edit_mode' => 'preview',
          'add_mode' => 'dropdown',
          'form_display_mode' => 'default',
          'default_paragraph_type' => '_none',
        ],
      ],
      'datetime' => [
        'type' => 'datetime_default',
        'weight' => 0,
        'settings' => [],
      ],
      'boolean' => [
        'type' => 'boolean_checkbox',
        'weight' => 0,
        'settings' => [
          'display_label' => TRUE,
        ],
        'third_party_settings' => [],
      ],
      'list_float' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'list_integer' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'decimal' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
      'float' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
      'integer' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
    ],
    'paragraph' => [
      'list_string' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'string' => [
        'type' => 'string_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 25,
          'placeholder' => '',
        ],
      ],
      'string_long' => [
        'type' => 'string_textarea',
        'weight' => 0,
        'settings' => [
          'rows' => 5,
          'placeholder' => '',
        ],
      ],
      'text' => [
        'type' => 'text_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 60,
          'placeholder' => '',
        ],
        'third_party_settings' => [
          'allowed_formats' => [
            'hide_help' => 1,
            'hide_guidlines' => 1,
          ],
        ],
      ],
      'text_long' => [
        'type' => 'text_textarea',
        'weight' => 0,
        'settings' => [
          'rows' => 5,
          'placeholder' => '',
        ],
        'third_party_settings' => [
          'allowed_formats' => [
            'hide_help' => 1,
            'hide_guidlines' => 1,
          ],
        ],
      ],
      'link' => [
        'type' => 'link_default',
        'weight' => 0,
        'settings' => [
          'placeholder_url' => '',
          'placeholder_title' => '',
        ],
      ],
      'entity_reference' => [
        'node' => [
          'type' => 'entity_reference_autocomplete',
          'weight' => 0,
          'settings' => [
            'match_operator' => 'CONTAINS',
            'size' => 60,
            'placeholder' => ' ',
          ],
          'third_party_settings' => [],
        ],
        'taxonomy_term' => [
          'type' => 'options_select',
          'weight' => 0,
          'settings' => [],
          'third_party_settings' => [],
        ],
        'media' => [
          'type' => 'inline_entity_form_complex',
          'weight' => 0,
          'settings' => [
            'form_mode' => 'inline_entity_form',
            'override_labels' => TRUE,
            'label_singular' => 'Image',
            'label_plural' => 'Images',
            'collapsible' => TRUE,
            'allow_new' => TRUE,
            'allow_existing' => TRUE,
            'match_operator' => 'CONTAINS',
            'collapsed' => FALSE,
            'allow_duplicate' => FALSE,
          ],
          'third_party_settings' => [],
        ],
      ],
      'entity_reference_revisions' => [
        'type' => 'entity_reference_paragraphs',
        'weight' => 0,
        'settings' => [
          'title' => 'Paragraph',
          'title_plural' => 'Paragraphs',
          'edit_mode' => 'preview',
          'add_mode' => 'dropdown',
          'form_display_mode' => 'default',
          'default_paragraph_type' => '_none',
        ],
      ],
      'datetime' => [
        'type' => 'datetime_default',
        'weight' => 0,
        'settings' => [],
      ],
      'boolean' => [
        'type' => 'boolean_checkbox',
        'weight' => 0,
        'settings' => [
          'display_label' => TRUE,
        ],
        'third_party_settings' => [],
      ],
      'list_float' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'list_integer' => [
        'type' => 'options_select',
        'weight' => 0,
        'settings' => [],
        'third_party_settings' => [],
      ],
      'decimal' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
      'float' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
      'integer' => [
        'type' => 'number',
        'weight' => 0,
        'settings' => [
          'placeholder' => '',
        ],
        'third_party_settings' => [],
      ],
    ],
  ];

  public $defaultFieldDisplaySettings = [
    'node' => [
      'list_string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'string',
        'settings' => [
          'link_to_entity' => FALSE,
        ],
      ],
      'string_long' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'basic_string',
        'settings' => [],
      ],
      'text' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'text_default',
        'settings' => [],
      ],
      'text_long' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'text_default',
        'settings' => [],
      ],
      'link' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'link',
        'settings' => [
          'trim_length' => 80,
          'target' => '_blank',
          'url_only' => FALSE,
          'url_plain' => FALSE,
          'rel' => 0,
        ],
      ],
      'entity_reference' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'entity_reference_entity_view',
        'settings' => [
          'view_mode' => 'default',
          'link' => FALSE,
        ],
      ],
      'entity_reference_revisions' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'entity_reference_revisions_entity_view',
        'settings' => [
          'view_mode' => 'default',
        ],
      ],
      'datetime' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'datetime_default',
        'settings' => [
          'timezone_override' => '',
          'format_type' => 'medium',
        ],
      ],
      'boolean' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'boolean',
        'settings' => [
          'format' => 'true-false',
          'format_custom_true' => '',
          'format_custom_false' => '',
        ],
      ],
      'list_float' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'list_integer' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'decimal' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_decimal',
        'settings' => [
          'thousand_separator' => ',',
          'decimal_separator' => '.',
          'scale' => 2,
          'prefix_suffix' => TRUE,
        ],
      ],
      'float' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_decimal',
        'settings' => [
          'thousand_separator' => ',',
          'decimal_separator' => '.',
          'scale' => 2,
          'prefix_suffix' => TRUE,
        ],
      ],
      'integer' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_integer',
        'settings' => [
          'thousand_separator' => ',',
          'prefix_suffix' => TRUE,
        ],
      ],
    ],
    'taxonomy_term' => [
      'list_string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'string',
        'settings' => [
          'link_to_entity' => FALSE,
        ],
      ],
      'string_long' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'basic_string',
        'settings' => [],
      ],
      'text' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'text_default',
        'settings' => [],
      ],
      'text_long' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'text_default',
        'settings' => [],
      ],
      'link' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'link',
        'settings' => [
          'trim_length' => 80,
          'target' => '_blank',
          'url_only' => FALSE,
          'url_plain' => FALSE,
          'rel' => 0,
        ],
      ],
      'entity_reference' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'entity_reference_entity_view',
        'settings' => [
          'view_mode' => 'default',
          'link' => FALSE,
        ],
      ],
      'entity_reference_revisions' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'entity_reference_revisions_entity_view',
        'settings' => [
          'view_mode' => 'default',
        ],
      ],
      'datetime' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'datetime_default',
        'settings' => [
          'timezone_override' => '',
          'format_type' => 'medium',
        ],
      ],
      'boolean' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'boolean',
        'settings' => [
          'format' => 'true-false',
          'format_custom_true' => '',
          'format_custom_false' => '',
        ],
      ],
      'list_float' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'list_integer' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'decimal' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_decimal',
        'settings' => [
          'thousand_separator' => ',',
          'decimal_separator' => '.',
          'scale' => 2,
          'prefix_suffix' => TRUE,
        ],
      ],
      'float' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_decimal',
        'settings' => [
          'thousand_separator' => ',',
          'decimal_separator' => '.',
          'scale' => 2,
          'prefix_suffix' => TRUE,
        ],
      ],
      'integer' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_integer',
        'settings' => [
          'thousand_separator' => ',',
          'prefix_suffix' => TRUE,
        ],
      ],
    ],
    'paragraph' => [
      'list_string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'string',
        'settings' => [
          'link_to_entity' => FALSE,
        ],
      ],
      'string_long' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'basic_string',
        'settings' => [],
      ],
      'text' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'text_default',
        'settings' => [],
      ],
      'text_long' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'text_default',
        'settings' => [],
      ],
      'link' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'link',
        'settings' => [
          'trim_length' => 80,
          'target' => '_blank',
          'url_only' => FALSE,
          'url_plain' => FALSE,
          'rel' => 0,
        ],
      ],
      'entity_reference' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'entity_reference_entity_view',
        'settings' => [
          'view_mode' => 'default',
          'link' => FALSE,
        ],
      ],
      'entity_reference_revisions' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'entity_reference_revisions_entity_view',
        'settings' => [
          'view_mode' => 'default',
        ],
      ],
      'datetime' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'datetime_default',
        'settings' => [
          'timezone_override' => '',
          'format_type' => 'medium',
        ],
      ],
      'boolean' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'boolean',
        'settings' => [
          'format' => 'true-false',
          'format_custom_true' => '',
          'format_custom_false' => '',
        ],
      ],
      'list_float' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'list_integer' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'list_default',
        'settings' => [],
      ],
      'decimal' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_decimal',
        'settings' => [
          'thousand_separator' => ',',
          'decimal_separator' => '.',
          'scale' => 2,
          'prefix_suffix' => TRUE,
        ],
      ],
      'float' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_decimal',
        'settings' => [
          'thousand_separator' => ',',
          'decimal_separator' => '.',
          'scale' => 2,
          'prefix_suffix' => TRUE,
        ],
      ],
      'integer' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'number_integer',
        'settings' => [
          'thousand_separator' => ',',
          'prefix_suffix' => TRUE,
        ],
      ],
    ],
  ];

  public $defaultFieldGroupWrapperSettings = [
    'node' => [],
    'taxonomy_term' => [],
    'paragraph' => [
      'label' => '',
      'children' => [],
      'parent_name' => '',
      'weight' => 0,
      'format_type' => 'tabs',
      'format_settings' => [
        'id' => '',
        'classes' => '',
        'direction' => 'horizontal',
      ],
    ],
  ];

  public $defaultFieldGroupSettings = [
    'node' => [],
    'taxonomy_term' => [],
    'paragraph' => [
      'label' => '',
      'children' => [],
      'parent_name' => '',
      'weight' => 0,
      'format_type' => 'tab',
      'format_settings' => [
        'id' => '',
        'classes' => '',
        'direction' => 'horizontal',
      ],
    ],
  ];

  /**
   * Getter methods.
   */

  public function getEntityNodeSettings($row) {
    $defaults = [
      'bundle' => $row['bundle'],
      'name' => $row['name'],
      'description' => $row['description'],
      'title_label' => !empty($row['title_label'])? $row['title_label'] : 'Title',
      'preview_mode' => !empty($row['preview_mode'])? $row['preview_mode'] : FALSE,
      'help' => !empty($row['help'])? $row['help'] : '',
      'new_revision' => !empty($row['new_revision'])? $row['new_revision'] : TRUE,
      'display_submitted' => !empty($row['display_submitted'])? $row['display_submitted'] : FALSE,
      'status' => !empty($row['status'])? $row['status'] : FALSE,
      'promote' => !empty($row['promote'])? $row['promote'] : FALSE,
      'sticky' => !empty($row['sticky'])? $row['sticky'] : FALSE,
      'available_menus' => !empty($row['available_menus'])? $row['available_menus'] : 'main',
      'parent' => !empty($row['parent'])? $row['parent'] : "mani:",
      'pathauto' => !empty($row['pathauto'])? $row['pathauto'] : '[node:title]',
    ];

    return $defaults;
  }

  public function getFieldStorageSettings($row, $entity_type) {

    if ($row['field_type'] == 'entity_reference') {
      return $this->getEntityReferenceFieldStorageSettings($row, $entity_type);
    }

    $storage_settings = array_merge($this->fieldStorageSettingsBase, $this->defaultFieldStorageSettings[$entity_type][$row['field_type']]);

    $storage_settings['entity_type'] = $entity_type;
    $storage_settings['type'] = $row['field_type'];
    $storage_settings['field_name'] = $row['machine_name'];
    $storage_settings['cardinality'] = $row['cardinality'];

    $storage_settings['settings'] = array_merge($storage_settings['settings'], $row['field_storage_settings']);

    switch ($row['field_type']) {
      case 'list_string':
      case 'list_float':
      case 'list_integer':
        $storage_settings['settings']['allowed_values'] = $row['allowed_values'];
        break;
    }
    return $storage_settings;
  }

  /**
   *
   */
  public function getFieldInstanceSettings($row, $entity_type) {

    if ($row['field_type'] == 'entity_reference') {
      return $this->getEntityReferenceFieldInstanceSettings($row, $entity_type);
    }

    $instance_settings = array_merge($this->fieldInstanceSettingsBase, $this->defaultFldInstSetts[$entity_type][$row['field_type']]);

    $instance_settings['label'] = $row['name'];
    $instance_settings['description'] = $row['description'];
    $instance_settings['required'] = $row['required'];

    $instance_settings = array_merge($instance_settings, $row['field_settings']);
    if (isset($row['field_third_party_settings'])) {
      $instance_settings['third_party_settings'] = array_merge($instance_settings['third_party_settings'], $row['field_third_party_settings']);
    }

    switch ($row['field_type']) {
      case 'entity_reference_revisions':
        // Process 'target_bundles' & 'target_bundles_drag_drop'.
        // ksm($row);
        $weight = 0;
        $paragraph_types = array_keys(ParagraphsType::loadMultiple());

        if (!empty($row['entity_reference'])) {

          foreach ($row['entity_reference'] as $para_type) {
            $instance_settings['handler_settings']['target_bundles'][$para_type] = $para_type;
            $instance_settings['handler_settings']['target_bundles_drag_drop'][$para_type] = [
              'enabled' => TRUE,
              'weight' => $weight,
            ];
            if (($key = array_search($para_type, $paragraph_types)) !== FALSE) {
              unset($paragraph_types[$key]);
            }
            $weight++;
          }
        }

        foreach ($paragraph_types as $para_type) {
          $instance_settings['handler_settings']['target_bundles_drag_drop'][$para_type] = [
            'enabled' => FALSE,
            'weight' => $weight,
          ];
          $weight++;
        }

        // ksm($instance_settings);
        break;
    }

    return $instance_settings;
  }

  /**
   *
   */
  public function getFieldFormSettings($row, $weight, $entity_type) {

    if ($row['field_type'] == 'entity_reference') {
      return $this->getEntityReferenceFieldFormSettings($row, $weight, $entity_type);
    }

    $settings = $this->defaultFieldFormSettings[$entity_type][$row['field_type']];

    $settings['weight'] = $weight;
    $settings['settings'] = array_merge($settings['settings'], $row['form_type_settings']);

    if (!empty($settings['third_party_settings']) || !empty($row['form_third_party_settings'])) {
      $settings['third_party_settings'] = array_merge($settings['third_party_settings'], $row['form_third_party_settings']);
    }

    if (isset($settings['third_party_settings']) && empty($settings['third_party_settings'])) {
      unset($settings['third_party_settings']);
    }

    return $settings;
  }

  /**
   *
   */
  public function getFieldDisplaySettings($row, $weight, $entity_type) {
    $settings = $this->defaultFieldDisplaySettings[$entity_type][$row['field_type']];

    $settings['weight'] = $weight;
    $settings['label'] = !empty($row['display_label']) ? $row['display_label'] : $settings['label'];
    $settings['type'] = !empty($row['display_type'])? $row['display_type'] : $settings['type'];
    $settings['settings'] = array_merge($settings['settings'], $row['display_type_settings']);

    if (!empty($settings['third_party_settings']) || !empty($row['display_type_third_party_settings'])) {
      $settings['third_party_settings'] = array_merge($settings['third_party_settings'], $row['display_type_third_party_settings']);
    }

    if (isset($settings['third_party_settings']) && empty($settings['third_party_settings'])) {
      unset($settings['third_party_settings']);
    }

    return $settings;
  }

  /**
   * Entity Reference getter exceptions.
   */
  protected function getEntityReferenceFieldStorageSettings($row, $entity_type) {
    $storage_settings = array_merge($this->fieldStorageSettingsBase, $this->defaultFieldStorageSettings[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']]);

    $storage_settings['entity_type'] = $entity_type;
    $storage_settings['type'] = $row['field_type'];
    $storage_settings['field_name'] = $row['machine_name'];
    $storage_settings['cardinality'] = $row['cardinality'];

    $storage_settings['settings'] = array_merge($storage_settings['settings'], $row['field_storage_settings']);

    return $storage_settings;
  }

  /**
   *
   */
  protected function getEntityReferenceFieldInstanceSettings($row, $entity_type) {
    $instance_settings = array_merge($this->fieldInstanceSettingsBase, $this->defaultFldInstSetts[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']]);

    $instance_settings['label'] = $row['name'];
    $instance_settings['description'] = $row['description'];
    $instance_settings['required'] = $row['required'];

    $instance_settings = array_merge($instance_settings, $row['field_settings']);

    // Set target_bundles.
    $weight = 0;

    if (!empty($row['entity_reference'])) {
      foreach ($row['entity_reference'] as $bundle) {
        $instance_settings['handler_settings']['target_bundles'][$bundle] = $bundle;
        $weight++;
      }
    }

    return $instance_settings;
  }

  /**
   *
   */
  protected function getEntityReferenceFieldFormSettings($row, $weight, $entity_type) {

    $settings = $this->defaultFieldFormSettings[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']];

    $settings['weight'] = $weight;
    $settings['settings'] = array_merge($settings['settings'], $row['form_type_settings']);

    return $settings;
  }

  /**
   *
   */
  public function getFieldGroupWrapperSettings($row, $bundle, $entity_type) {
    $settings = $this->defaultFieldGroupWrapperSettings[$entity_type];

    $settings['group_name'] = $row['group_name'];
    $settings['entity_type'] = $row['entity_type'];
    $settings['bundle'] = $row['bundle'];
    $settings['mode'] = $row['mode'];
    $settings['context'] = $row['context'];
    $settings['parent_name'] = $row['parent_name'];
    $settings['weight'] = $row['weight'];
    $settings['format_type'] = $row['format_type'];
    $settings['label'] = $row['label'];

    $settings['format_settings'] = array_merge($settings['format_settings'], $row['format_settings']);
    $settings['children'] = array_merge($settings['children'], $row['children']);

    return $settings;
  }

  /**
   *
   */
  public function getFieldGroupSettings($row, $bundle, $entity_type) {
    $settings = $this->defaultFieldGroupSettings[$entity_type];

    $settings['group_name'] = $row['group_name'];
    $settings['entity_type'] = $row['entity_type'];
    $settings['bundle'] = $row['bundle'];
    $settings['mode'] = $row['mode'];
    $settings['context'] = $row['context'];
    $settings['parent_name'] = $row['parent_name'];
    $settings['weight'] = $row['weight'];
    $settings['format_type'] = $row['format_type'];
    $settings['label'] = $row['label'];

    $settings['format_settings'] = array_merge($settings['format_settings'], $row['format_settings']);
    $settings['children'] = array_merge($settings['children'], $row['children']);

    return $settings;
  }

}
