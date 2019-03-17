<?php

namespace Drupal\bc_aicc;

use Drupal\paragraphs\Entity\ParagraphsType;

/**
 *
 */
class BCDefaults {

  protected $storageSettBase = [
    'entity_type' => '',
    'type' => '',
    'field_name' => '',
    'cardinality' => 1,
    'settings' => [],
  ];

  protected $storageSett = [
    'file' => [
      'settings' => [
        'display_field' => FALSE,
        'display_default' => FALSE,
        'uri_scheme' => 'public',
        'target_type' => 'file',
      ],
    ],
    'image' => [
      'settings' => [
        'display_field' => FALSE,
        'display_default' => FALSE,
        'uri_scheme' => 'public',
        'target_type' => 'file',
        'default_image' => [
          'uuid' => '',
          'alt' => '',
          'title' => '',
          'width' => NULL,
          'height' => NULL,
        ],
      ],
    ],
    'email' => [
      'settings' => [],
    ],
    'phone' => [
      'settings' => [],
    ],
    'address' => [
      'settings' => [],
    ],
    'address_country' => [
      'settings' => [],
    ],
    'address_zone' => [
      'settings' => [],
    ],
  ];

  protected $storageSettByEnt = [
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
      'viewsreference' => [
        'cardinality' => 1,
        'settings' => [
          'taget_type' => 'view',
        ],
      ],
      'name' => [
        'cardinality' => 1,
        'settings' => [

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
      'viewsreference' => [
        'cardinality' => 1,
        'settings' => [
          'taget_type' => 'view',
        ],
      ],
      'name' => [
        'cardinality' => 1,
        'settings' => [

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
      'viewsreference' => [
        'cardinality' => 1,
        'settings' => [
          'taget_type' => 'view',
        ],
      ],
      'name' => [
        'cardinality' => 1,
        'settings' => [

        ],
      ],
    ],
  ];

  protected $instSettBase = [
    'label' => '',
    'description' => '',
    'required' => FALSE,
    'settings' => [],
    'third_party_settings' => [],
  ];

  protected $instSett = [
    'entity_reference' => [
      'node' => [
        'settings' => [
          'handler' => 'default:node',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'title',
              'direction' => 'ASC',
            ],
            'auto_create' => false,
            'auto_create_bundle' => '',
          ],
        ],
      ],
      'taxonomy_term' => [
        'settings' => [
          'handler' => 'default:taxonomy_term',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => 'name',
              'direction' => 'ASC',
            ],
            'auto_create' => false,
            'auto_create_bundle' => '',
          ],
        ],
      ],
      'media' => [
        'settings' => [
          'handler' => 'default:media',
          'handler_settings' => [
            'target_bundles' => [],
            'sort' => [
              'field' => '_none',
            ],
            'auto_create' => false,
            'auto_create_bundle' => '',
          ],
        ],
      ],
    ],
    'entity_reference_revisions' => [
      'settings' => [
        'handler' => 'default:paragraph',
        'handler_settings' => [
          'negate' => 0,
          'target_bundles' => [],
          'target_bundles_drag_drop' => [],
        ],
      ],
    ],
    'file' => [
      'settings' => [
        'file_directory' => '[date:custom:Y]-[date:custom:m]',
        'file_extensions' => 'txt pdf',
        'max_filesize' => '',
        'description_field' => FALSE,
        'handler' => 'default:file',
        'handler_settings' => [],
      ],
    ],
    'image' => [
      'settings' => [
        'file_directory' => '[date:custom:Y]-[date:custom:m]',
        'file_extensions' => 'txt pdf',
        'max_filesize' => '',
        'max_resolution' => '',
        'min_resolution' => '',
        'alt_field' => TRUE,
        'alt_field_required' => TRUE,
        'title_field' => FALSE,
        'title_field_required' => FALSE,
        'default_image' => [
          'uuid' => '',
          'alt' => '',
          'title' => '',
          'width' => NULL,
          'height' => NULL,
        ],
        'handler' => 'default:file',
        'handler_settings' => [],
      ],
    ],
    'email' => [
      'settings' => [],
    ],
    'phone' => [
      'settings' => [],
    ],
    'address' => [
      'settings' => [
        'available_countries' => [
          'US' => 'US',
        ],
        'langcode_override' => '',
        'field_overrides' => [
          'givenName' => [
            'override' => 'hidden',
          ],
          'additionalName' => [
            'override' => 'hidden',
          ],
          'familyName' => [
            'override' => 'hidden',
          ],
          'organization' => [
            'override' => 'hidden',
          ],
        ],
        'fields' => [],
      ],
    ],
    'address_country' => [
      'settings' => [
        'available_countries' => [
          'CA' => 'CA',
          'MX' => 'MX',
          'US' => 'US',
        ],
      ],
    ],
    'address_zone' => [
      'settings' => [
        'available_countries' => [
          'CA' => 'CA',
          'MX' => 'MX',
          'US' => 'US',
        ],
      ],
    ]
  ];

  protected $instSettByEnt = [
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
      'viewsreference' => [
        'settings' => [
          'handler' => 'default:view',
          'handler_settings' => [
            'target_bundles' => NULL,
            'auto_create' => 0,
          ],
          'plugin_types' => [
            'block' => 'block',
            'default' => 0,
            'page' => 0,
            'feed' => 0,
            'entity_browser' => 0,
          ],
          'preselect_views' => [],
          'enabled_settings' => [
            'pager' => 0,
            'argument' => 'argument',
            'limit' => 0,
            'title' => 'title',
            'offset' => 0,
          ],
        ],
      ],
      'name' => [
        'settings' => [],
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
      'viewsreference' => [
        'settings' => [
          'handler' => 'default:view',
          'handler_settings' => [
            'target_bundles' => NULL,
            'auto_create' => 0,
          ],
          'plugin_types' => [
            'block' => 'block',
            'default' => 0,
            'page' => 0,
            'feed' => 0,
            'entity_browser' => 0,
          ],
          'preselect_views' => [],
          'enabled_settings' => [
            'pager' => 0,
            'argument' => 'argument',
            'limit' => 0,
            'title' => 'title',
            'offset' => 0,
          ],
        ],
      ],
      'name' => [
        'settings' => [],
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
      'viewsreference' => [
        'settings' => [
          'handler' => 'default:view',
          'handler_settings' => [
            'target_bundles' => NULL,
            'auto_create' => 0,
          ],
          'plugin_types' => [
            'block' => 'block',
            'default' => 0,
            'page' => 0,
            'feed' => 0,
            'entity_browser' => 0,
          ],
          'preselect_views' => [],
          'enabled_settings' => [
            'pager' => 0,
            'argument' => 'argument',
            'limit' => 0,
            'title' => 'title',
            'offset' => 0,
          ],
        ],
      ],
      'name' => [
        'settings' => [],
      ],
    ],
  ];

  protected $formSettBase = [
    'type' => '',
    'weight' => 0,
    'settings' => [],
    'third_party_settings' => [],
  ];

  protected $formSett = [
    'file' => [
      'type' => 'file_generic',
      'settings' => [
        'progress_indicator' => 'throbber',
      ],
    ],
    'image' => [
      'type' => 'image_focal_point',
      'settings' => [
        'preview_image_style' => 'thumbnail',
        'preview_link' => TRUE,
        'offsets' => '50,50',
        'progress_indicator' => 'throbber',
      ],
    ],
    'email' => [
      'type' => 'email_default',
      'settings' => [
        'size' => 60,
        'placeholder' => '',
      ],
      'third_party_settings' => [],
    ],
    'phone' => [
      'type' => 'telephone_default',
      'settings' => [
        'placeholder' => '',
      ],
    ],
    'address' => [
      'type' => 'address_default',
      'settings' => [
        'default_country' => 'US',
      ],
    ],
    'address_country' => [
      'type' => 'address_country_default',
    ],
    'address_zone' => [
      'type' => 'address_zone_default',
      'settings' => [
        'show_label_field' => FALSE,
      ],
    ]
  ];

  protected $formSettByEnt = [
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
            'hide_guidelines' => 1,
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
            'hide_guidelines' => 1,
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
          'third_party_settings' => [
            'entity_browser_entity_form' => [
              'entity_browser_id' => 'image_browser',
            ],
          ],
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
      'viewsreference' => [
        'type' => 'viewsreference_autocomplete',
        'weight' => 0,
        'settings' => [
          'plugin_types' => [
            'block' => 'block',
            'default' => 0,
            'page' => 0,
            'feed' => 0,
            'entity_browser' => 0,
          ],
        ],
      ],
      'name' => [
        'type' => 'name_default',
        'weight' => 0,
        'settings' => [],
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
            'hide_guidelines' => 1,
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
            'hide_guidelines' => 1,
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
          'third_party_settings' => [
            'entity_browser_entity_form' => [
              'entity_browser_id' => 'image_browser',
            ],
          ],
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
      'viewsreference' => [
        'type' => 'viewsreference_autocomplete',
        'weight' => 0,
        'settings' => [
          'plugin_types' => [
            'block' => 'block',
            'default' => 0,
            'page' => 0,
            'feed' => 0,
            'entity_browser' => 0,
          ],
        ],
      ],
      'name' => [
        'type' => 'name_default',
        'weight' => 0,
        'settings' => [],
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
            'hide_guidelines' => 1,
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
            'hide_guidelines' => 1,
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
          'third_party_settings' => [
            'entity_browser_entity_form' => [
              'entity_browser_id' => 'image_browser',
            ],
          ],
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
      'viewsreference' => [
        'type' => 'viewsreference_autocomplete',
        'weight' => 0,
        'settings' => [
          'plugin_types' => [
            'block' => 'block',
            'default' => 0,
            'page' => 0,
            'feed' => 0,
            'entity_browser' => 0,
          ],
        ],
      ],
      'name' => [
        'type' => 'name_default',
        'weight' => 0,
        'settings' => [],
      ],
    ],
  ];

  protected $dispSettBase = [
    'weight' => 0,
    'label' => 'hidden',
    'type' => '',
    'settings' => [],
  ];

  protected $dispSett =[
    'file' => [
      'type' => 'file_default',
      'settings' => [
        'use_description_as_link_text' => TRUE,
      ],
    ],
    'image' => [
      'type' => 'image',
      'settings' => [
        'image_style' => '',
        'image_link' => '',
      ],
    ],
    'email' => [
      'type' => 'basic_string',
    ],
    'phone' => [
      'type' => 'telephone_link',
      'settings' => [
        'title' => '',
      ],
    ],
    'address' => [
      'type' => 'address_default',
    ],
    'address_country' => [
      'type' => 'address_country_default',
    ],
    'address_zone' => [
      'type' => '-none-',
    ]
  ];

  protected $disSettByEnt = [
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
      'viewsreference' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'viewsreference_formatter',
        'settings' => [
          'thousand_separator' => ',',
          'prefix_suffix' => true,
        ],
      ],
      'name' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'name_default',
        'settings' => [
          'format' => 'default',
          'output' => 'default',
          'multiple' => 'default',
          'multiple_delimiter' => ', ',
          'multiple_and' => 'text',
          'multiple_delimiter_precedes_last' => 'never',
          'multiple_el_al_min' => '3',
          'multiple_el_al_first' => '1',
          'markup' => FALSE,
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
      'viewsreference' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'viewsreference_formatter',
        'settings' => [
          'thousand_separator' => ',',
          'prefix_suffix' => true,
        ],
      ],
      'name' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'name_default',
        'settings' => [
          'format' => 'default',
          'output' => 'default',
          'multiple' => 'default',
          'multiple_delimiter' => ', ',
          'multiple_and' => 'text',
          'multiple_delimiter_precedes_last' => 'never',
          'multiple_el_al_min' => '3',
          'multiple_el_al_first' => '1',
          'markup' => FALSE,
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
      'viewsreference' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'viewsreference_formatter',
        'settings' => [
          'thousand_separator' => ',',
          'prefix_suffix' => true,
        ],
      ],
      'name' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'name_default',
        'settings' => [
          'format' => 'default',
          'output' => 'default',
          'multiple' => 'default',
          'multiple_delimiter' => ', ',
          'multiple_and' => 'text',
          'multiple_delimiter_precedes_last' => 'never',
          'multiple_el_al_min' => '3',
          'multiple_el_al_first' => '1',
          'markup' => FALSE,
        ],
      ],
    ],
  ];

  protected $fgWrapSett = [
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
  ];

  protected $fgWrapSettByEnt = [];

  protected $fgSett = [
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
  ];

  protected $fgSettByEnt = [];

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
      'parent' => !empty($row['parent'])? $row['parent'] : "main:",
      'pathauto' => !empty($row['pathauto'])? $row['pathauto'] : '[node:title]',
    ];

    return $defaults;
  }

  public function getFieldStorageSettings($row, $entity_type) {

    if ($row['field_type'] == 'entity_reference') {
      return $this->getEntityReferenceFieldStorageSettings($row, $entity_type);
    }

    if ($row['field_type'] == 'name') {
      return $this->getNameFieldStorageSettings($row, $entity_type);
    }

    $baseSettings = $this->storageSettBase;
    $simple = isset($this->storageSett[$row['field_type']])? $this->storageSett[$row['field_type']] : [];
    $byEntity = isset($this->storageSettByEnt[$entity_type][$row['field_type']])? $this->storageSettByEnt[$entity_type][$row['field_type']] : [];

    $storage_settings = array_replace_recursive($baseSettings, $simple, $byEntity);

    $storage_settings['entity_type'] = $entity_type;
    $storage_settings['type'] = $row['field_type'];
    $storage_settings['field_name'] = $row['machine_name'];

    if (!empty($row['cardinality']) ) {
      $storage_settings['cardinality'] = $row['cardinality'];
    }

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

    if ($row['field_type'] == 'name') {
      return $this->getNameFieldInstanceSettings($row, $entity_type);
    }

    $baseSettings = $this->instSettBase;
    $simple = isset($this->instSett[$row['field_type']]) ? $this->instSett[$row['field_type']] : [];
    $byEntity = isset($this->instSettByEnt[$entity_type][$row['field_type']]) ? $this->instSettByEnt[$entity_type][$row['field_type']] : [];

    $instance_settings = array_replace_recursive($baseSettings, $simple, $byEntity);

    // ksm($baseSettings, $simple, $byEntity, $instance_settings);

    $instance_settings['label'] = $row['name'];
    $instance_settings['description'] = $row['description'];
    $instance_settings['required'] = $row['required'];

    $instance_settings['settings'] = array_merge($instance_settings['settings'], $row['field_settings']);

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
            $instance_settings['settings']['handler_settings']['target_bundles'][$para_type] = $para_type;
            $instance_settings['settings']['handler_settings']['target_bundles_drag_drop'][$para_type] = [
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
          $instance_settings['settings']['handler_settings']['target_bundles_drag_drop'][$para_type] = [
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

    $baseSettings = $this->formSettBase;
    $simple = isset($this->formSett[$row['field_type']])? $this->formSett[$row['field_type']] : [];
    $byEntity = isset($this->formSettByEnt[$entity_type][$row['field_type']])? $this->formSettByEnt[$entity_type][$row['field_type']] : [];

    $settings = array_replace_recursive($baseSettings, $simple, $byEntity);

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
    $baseSettings = $this->dispSettBase;
    $simple = isset($this->dispSett[$row['field_type']])? $this->dispSett[$row['field_type']] : [];
    $byEntity = isset($this->disSettByEnt[$entity_type][$row['field_type']])? $this->disSettByEnt[$entity_type][$row['field_type']] : [];

    $settings = array_replace_recursive($baseSettings, $simple, $byEntity);

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
   * Entity Reference storage getter exceptions.
   */
  protected function getEntityReferenceFieldStorageSettings($row, $entity_type) {
    $baseSettings = $this->storageSettBase;
    $simple = isset($this->storageSett[$row['field_type']][$row['field_storage_settings']['target_type']])? $this->storageSett[$row['field_type']][$row['field_storage_settings']['target_type']] : [];
    $byEntity = isset($this->storageSettByEnt[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']])? $this->storageSettByEnt[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']] : [];

    $storage_settings = array_replace_recursive($baseSettings, $simple, $byEntity);

    $storage_settings['entity_type'] = $entity_type;
    $storage_settings['type'] = $row['field_type'];
    $storage_settings['field_name'] = $row['machine_name'];

    if (!empty($row['cardinality']) ) {
      $storage_settings['cardinality'] = $row['cardinality'];
    }

    $storage_settings['settings'] = array_merge($storage_settings['settings'], $row['field_storage_settings']);

    return $storage_settings;
  }

  /**
   * Entity Reference instance getter exceptions.
   */
  protected function getEntityReferenceFieldInstanceSettings($row, $entity_type) {
    $baseSettings = $this->instSettBase;
    $simple = isset($this->instSett[$row['field_type']][$row['field_storage_settings']['target_type']])? $this->instSett[$row['field_type']][$row['field_storage_settings']['target_type']] : [];
    $byEntity = isset($this->instSettByEnt[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']])? $this->instSettByEnt[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']] : [];

    $instance_settings = array_replace_recursive($baseSettings, $simple, $byEntity);

    $instance_settings['label'] = $row['name'];
    $instance_settings['description'] = $row['description'];
    $instance_settings['required'] = $row['required'];

    $instance_settings['settings'] = array_merge($instance_settings['settings'], $row['field_settings']);

    // Set target_bundles.
    $weight = 0;

    if (!empty($row['entity_reference'])) {
      foreach ($row['entity_reference'] as $bundle) {
        $instance_settings['settings']['handler_settings']['target_bundles'][$bundle] = $bundle;
        $weight++;
      }
    }

    return $instance_settings;
  }

  /**
   *
   */
  protected function getEntityReferenceFieldFormSettings($row, $weight, $entity_type) {
    $baseSettings = $this->formSettBase;
    $simple = isset($this->formSett[$row['field_type']][$row['field_storage_settings']['target_type']])? $this->formSett[$row['field_type']][$row['field_storage_settings']['target_type']] : [];
    $byEntity = isset($this->formSettByEnt[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']])? $this->formSettByEnt[$entity_type][$row['field_type']][$row['field_storage_settings']['target_type']] : [];

    $settings = array_replace_recursive($baseSettings, $simple, $byEntity);

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
   * NAME storage getter exceptions.
   */
  protected function getNameFieldStorageSettings($row, $entity_type) {

    $baseSettings = $this->storageSettBase;
    $simple = isset($this->storageSett[$row['field_type']]) ? $this->storageSett[$row['field_type']] : [];
    $byEntity = isset($this->storageSettByEnt[$entity_type][$row['field_type']]) ? $this->storageSettByEnt[$entity_type][$row['field_type']] : [];

    $storage_settings = array_replace_recursive($baseSettings, $simple, $byEntity);

    $storage_settings['entity_type'] = $entity_type;
    $storage_settings['type'] = $row['field_type'];
    $storage_settings['field_name'] = $row['machine_name'];

    if (!empty($row['cardinality'])) {
      $storage_settings['cardinality'] = $row['cardinality'];
    }

    // Add in defaults from the field definititon.
    // $nameItem = new \Drupal\name\Plugin\Field\FieldType\NameItem();
    $storage_settings['settings'] = array_merge($storage_settings['settings'], \Drupal\name\Plugin\Field\FieldType\NameItem::defaultStorageSettings());

    $storage_settings['settings'] = array_merge($storage_settings['settings'], $row['field_storage_settings']);

    return $storage_settings;
  }

  /**
   * NAME instance getter exceptions.
   */
  protected function getNameFieldInstanceSettings($row, $entity_type) {
    $baseSettings = $this->instSettBase;
    $simple = isset($this->instSett[$row['field_type']]) ? $this->instSett[$row['field_type']] : [];
    $byEntity = isset($this->instSettByEnt[$entity_type][$row['field_type']]) ? $this->instSettByEnt[$entity_type][$row['field_type']] : [];

    $instance_settings = array_replace_recursive($baseSettings, $simple, $byEntity);

    $instance_settings['label'] = $row['name'];
    $instance_settings['description'] = $row['description'];
    $instance_settings['required'] = $row['required'];


    // Add in defaults from the field definititon.
    // $nameItem = new \Drupal\name\Plugin\Field\FieldType\NameItem();
    $instance_settings['settings'] = array_merge($instance_settings['settings'], \Drupal\name\Plugin\Field\FieldType\NameItem::defaultFieldSettings());

    $instance_settings = array_merge($instance_settings, $row['field_settings']);
    if (isset($row['field_third_party_settings'])) {
      $instance_settings['third_party_settings'] = array_merge($instance_settings['third_party_settings'], $row['field_third_party_settings']);
    }

    return $instance_settings;
  }

  /**
   *
   */
  public function getFieldGroupWrapperSettings($row, $bundle, $weight, $entity_type) {

    $byEntity = isset($this->fgWrapSettByEnt[$entity_type]) ? $this->fgWrapSettByEnt[$entity_type] : [];
    $settings = array_replace_recursive($this->fgWrapSett, $byEntity);

    $settings['group_name'] = $row['group_name'];
    // $settings['entity_type'] = $row['entity_type'];
    $settings['bundle'] = $row['bundle'];
    // $settings['mode'] = $row['mode'];
    // $settings['context'] = $row['context'];
    $settings['parent_name'] = $row['parent_name'];
    $settings['weight'] = $weight;
    $settings['format_type'] = $row['format_type'];
    $settings['label'] = $row['label'];

    $settings['format_settings'] = array_merge($settings['format_settings'], $row['format_settings']);
    $settings['children'] = array_merge($settings['children'], $row['children']);

    return $settings;
  }

  /**
   *
   */
  public function getFieldGroupSettings($row, $bundle, $weight, $entity_type) {

    $byEntity = isset($this->fgSettByEnt[$entity_type]) ? $this->fgSettByEnt[$entity_type] : [];
    $settings = array_replace_recursive($this->fgSett, $byEntity);

    $settings['group_name'] = $row['group_name'];
    // $settings['entity_type'] = $row['entity_type'];
    $settings['bundle'] = $row['bundle'];
    // $settings['mode'] = $row['mode'];
    // $settings['context'] = $row['context'];
    $settings['parent_name'] = $row['parent_name'];
    $settings['weight'] = $weight;
    $settings['format_type'] = $row['format_type'];
    $settings['label'] = $row['label'];

    $settings['format_settings'] = array_merge($settings['format_settings'], $row['format_settings']);
    $settings['children'] = array_merge($settings['children'], $row['children']);

    return $settings;
  }

}
