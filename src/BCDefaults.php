<?php

namespace Drupal\bc_aicc;

use Drupal\paragraphs\Entity\ParagraphsType;

class BCDefaults {

  public $fieldStorageSettingsBase = [
    'entity_type' => '',
    'type' => '',
    'field_name' => '',
    'cardinality' => 1,
  ];

  public $defaultFieldStorageSettings = [
    'node' => [
      'string' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'entity_reference_revisions' => [
        'cardinality' => -1,
        'settings' => [
          'target_type' => 'paragraph',
        ],
      ],
    ],
    'taxonomy_term' => [
      'string' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'entity_reference_revisions' => [
        'cardinality' => -1,
        'settings' => [
          'target_type' => 'paragraph',
        ],
      ],
    ],
    'paragraph' => [
      'string' => [
        'settings' => [
          'max_length' => 255,
        ],
      ],
      'entity_reference_revisions' => [
        'cardinality' => -1,
        'settings' => [
          'target_type' => 'paragraph',
        ],
      ],
    ],
  ];

  public $fieldInstanceSettingsBase = [
    'label' => '',
    'description' => '',
    'required' => false,
  ];

  public $defaultFieldInstanceSettings = [
    'node' => [
      'string' => [],
      'entity_reference_revisions' => [
        'handler' => 'default:paragraph',
        'handler_settings' => [
          'negate' => 0,
          'target_bundles' => [],
          'target_bundles_drag_drop' => [],
        ],
      ],
    ],
    'taxonomy_term' => [
      'string' => [],
      'entity_reference_revisions' => [
        'handler' => 'default:paragraph',
        'handler_settings' => [
          'negate' => 0,
          'target_bundles' => [],
          'target_bundles_drag_drop' => [],
        ],
      ],
    ],
    'paragraph' => [
      'string' => [],
      'entity_reference_revisions' => [
        'handler' => 'default:paragraph',
        'handler_settings' => [
          'negate' => 0,
          'target_bundles' => [],
          'target_bundles_drag_drop' => [],
        ],
      ],
    ],
  ];

  public $defaultFieldFormSettings = [
    'node' => [
      'string' => [
        'type' => 'string_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 25,
          'placeholder' => '',
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
          'form_display_mode' => 'preview',
          'default_paragraph_type' => '_none',
        ],
      ],
    ],
    'taxonomy_term' => [
      'string' => [
        'type' => 'string_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 25,
          'placeholder' => '',
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
          'form_display_mode' => 'preview',
          'default_paragraph_type' => '_none',
        ],
      ],
    ],
    'paragraph' => [
      'string' => [
        'type' => 'string_textfield',
        'weight' => 0,
        'settings' => [
          'size' => 25,
          'placeholder' => '',
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
          'form_display_mode' => 'preview',
          'default_paragraph_type' => '_none',
        ],
      ],
    ],
  ];

  public $defaultFieldDisplaySettings = [
    'node' => [
      'string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'string',
        'settings' => [
          'link_to_entity' => false,
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
    ],
    'taxonomy_term' => [
      'string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'string',
        'settings' => [
          'link_to_entity' => false,
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
    ],
    'paragraph' => [
      'string' => [
        'weight' => 0,
        'label' => 'hidden',
        'type' => 'string',
        'settings' => [
          'link_to_entity' => false,
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
    ],
  ];




  public function getFieldStorageSettings($row, $entity_type) {
    $storage_settings = array_merge($this->fieldStorageSettingsBase, $this->defaultFieldStorageSettings[$entity_type][$row['field_type']]);

    $storage_settings['entity_type'] = $entity_type;
    $storage_settings['type'] = $row['field_type'];
    $storage_settings['field_name'] = $row['machine_name'];
    $storage_settings['cardinality'] = $row['cardinality'];

    $storage_settings['settings'] = array_merge($storage_settings['settings'], $row['field_storage_settings']);

    return $storage_settings;
  }

  public function getFieldInstanceSettings($row, $entity_type) {
    $instance_settings = array_merge($this->fieldInstanceSettingsBase, $this->defaultFieldInstanceSettings[$entity_type][$row['field_type']]);

    $instance_settings['label'] = $row['name'];
    $instance_settings['description'] = $row['description'];
    $instance_settings['required'] = $row['required'];

    $instance_settings = array_merge($instance_settings, $row['field_settings']);

    switch ($row['field_type']) {
      case 'entity_reference_revisions':
        // Process 'target_bundles' & 'target_bundles_drag_drop'.
        ksm($row);
        $weight = 0;
        $paragraph_types = array_keys(ParagraphsType::loadMultiple());

        if (!empty($row['entity_reference'])) {

          foreach ($row['entity_reference'] as $para_type) {
            $instance_settings['handler_settings']['target_bundles'][$para_type] = $para_type;
            $instance_settings['handler_settings']['target_bundles_drag_drop'][$para_type] = [
              'enabled' => TRUE,
              'weight' => $weight,
            ];
            if (($key = array_search($para_type, $paragraph_types)) !== false) {
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

        ksm($instance_settings);
      break;
    }

    return $instance_settings;
  }

  public function getFieldFormSettings($row, $weight, $entity_type) {
    $settings = $this->defaultFieldFormSettings[$entity_type][$row['field_type']];

    $settings['weight'] = $weight;
    $settings['settings'] = array_merge($settings['settings'], $row['form_type_settings']);

    return $settings;
  }

  public function getFieldDisplaySettings($row, $weight, $entity_type) {
    $settings = $this->defaultFieldDisplaySettings[$entity_type][$row['field_type']];

    $settings['weight'] = $weight;
    $settings['settings'] = array_merge($settings['settings'], $row['display_type_settings']);

    return $settings;
  }
}
