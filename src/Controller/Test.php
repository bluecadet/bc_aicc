<?php

namespace Drupal\bc_aicc\Controller;

use Drupal\Core\Controller\ControllerBase;
// use Drupal\Core\Database\Database;
// use Drupal\Core\Queue\QueueFactory;
// use Drupal\Core\Queue\QueueWorkerManagerInterface;
use Drupal\node\Entity\NodeType;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Drupal\taxonomy\Entity\Vocabulary;

use Drupal\paragraphs\Entity\Paragraph;
use Drupal\paragraphs\Entity\ParagraphsType;

/**
 *
 */
class Test extends ControllerBase {

  public function viewTest() {

    $array = [
      'test1' => [
        'test2' => 'BOB',
      ],
    ];
    $array2 = [];

    $keys = ['test1', 'test2'];


    $current = &$array;
    foreach ($keys as $key) {
      $current = &$current[$key];
    }
    // $current = $value;
    ksm($current);
    ksm($array);


    // $vocab_settings = [
    //   'name' => 'Super Vocab!',
    //   'vid' => 'super',
    //   'description' => 'This is a Super vocab.',
    // ];

    // $v = Vocabulary::load($vocab_settings['vid']);
    // ksm($v);
    // if (empty($v)) {
    //   $v = Vocabulary::create($vocab_settings);
    //   $v->isNew();
    //   $v->save();
    // }
    // ksm($v);


    // $types = array_keys(ParagraphsType::loadMultiple());
    // ksm($types);
    // return [];

    // $paragraph_config = [
    //   'label' => 'Header',
    //   'id' => 'header',
    //   'description' => 'This is a header paragraph',
    // ];

    // $p = ParagraphsType::load($paragraph_config['id']);
    // ksm($p);
    // if (empty($p)) {
    //   $p = ParagraphsType::create($paragraph_config);
    //   $p->isNew();
    //   $p->save();
    // }
    // ksm($p);




    // $content_type_machine_name = 'test';
    // $content_type_label = 'Test';

    // // Check if Content Type exists.
    // $node_type = NodeType::load($content_type_machine_name);

    // ksm($node_type);

    // // If not, add it.
    // if (empty($node_type)) {
    //   $content_type = NodeType::create( [
    //     'type' => $content_type_machine_name,
    //     'name' => $content_type_label,
    //     'description' => 'This is the description',
    //     'title_label' => 'Title Label',
    //     'preview_mode' => 0,
    //     'help' => 'This is the help',
    //     'new_revision' => TRUE,
    //     'display_submitted' => FALSE,
    //   ]);

    //   // Menu
    //   $content_type->setThirdPartySetting('menu_ui', 'available_menus', ['main', 'tools']);
    //   $content_type->setThirdPartySetting('menu_ui', 'parent', 'tools:');

    //   $content_type->save();

    //   $fields = \Drupal::service('entity_field.manager')->getFieldDefinitions('node', $content_type_machine_name);
    //   $fields['status']->getConfig($content_type_machine_name)
    //     ->setDefaultValue(false)
    //     ->save();

    //   $fields['promote']->getConfig($content_type_machine_name)
    //     ->setDefaultValue(false)
    //     ->save();

    //   $fields['sticky']->getConfig($content_type_machine_name)
    //     ->setDefaultValue(false)
    //     ->save();

    //   ksm($content_type);

    // }
    // else {
    //   drupal_set_message('Already created content type.');
    // }




    // $field_machine_name = 'field_test_term';
    // $storage_settings = [
    //   'entity_type' => 'node',
    //   'type' => 'entity_reference',
    //   'field_name' => $field_machine_name,
    //   'cardinality' => -1,
    //   'settings' => [
    //     'target_type' => 'taxonomy_term',
    //   ],
    // ];

    // $instance_settings = [
    //   'label' => 'Test Paragraph',
    //   'description' => '',
    //   'required' => FALSE,
    //   'handler' => 'default:taxonomy_term',
    //   'handler_settings' => [
    //     'negate' => 0,
    //     'target_bundles' => [
    //       'test_2' => 'test_2'
    //     ],
    //     'target_bundles_drag_drop' => [
    //       'test_2' => [
    //         'enabled' => true,
    //         'weight' => 3,
    //       ],
    //       'test_1' => [
    //         'weight' => 4,
    //         'enabled' => false,
    //       ],
    //       'header' => [
    //         'weight' => 5,
    //         'enabled' => false,
    //       ],
    //     ],
    //   ],
    // ];


    // $field_storage = FieldStorageConfig::loadByName('node', $field_machine_name);
    // ksm($field_storage);

    // if (empty($field_storage)) {
    //   $field_storage = FieldStorageConfig::create($storage_settings);
    //   $field_storage->save();
    //   ksm($field_storage);
    // }
    // else {
    //   drupal_set_message('Already created Field storage.');
    // }

    // $field = FieldConfig::loadByName('node', $content_type_machine_name, $field_machine_name);
    // if (empty($field)) {

    //   $field = entity_create('field_config', [
    //     'field_storage' => $field_storage,
    //     'bundle' => $content_type_machine_name,
    //     'label' => $instance_settings['label'],
    //     'settings' => $instance_settings,
    //   ]);
    //   $field->save();
    // }

    // ksm($field);

    // // Assign widget settings for the 'default' form mode.
    // entity_get_form_display('node', $content_type_machine_name, 'default')
    //   ->setComponent($field_machine_name, [
    //     'type' => 'entity_reference_paragraphs',
    //     'weight' => -50,
    //     'settings' => [
    //       'title' => 'Paragraph',
    //       'title_plural' => 'Paragraphs',
    //       'edit_mode' => 'preview',
    //       'add_mode' => 'dropdown',
    //       'form_display_mode' => 'preview',
    //       'default_paragraph_type' => '_none',
    //     ],
    //   ])
    //   ->save();

    // // Assign display settings for the 'default' and 'teaser' view modes.
    // entity_get_display('node', $content_type_machine_name, 'default')
    //   ->setComponent($field_machine_name, [
    //     'weight' => -50,
    //     'label' => 'hidden',
    //     'type' => 'entity_reference_revisions_entity_view',
    //     'settings' => [
    //       'view_mode' => 'default',
    //     ],
    //   ])
    //   ->save();















    // $field_machine_name = 'field_test_para';
    // $storage_settings = [
    //   'entity_type' => 'node',
    //   'type' => 'entity_reference_revisions',
    //   'field_name' => $field_machine_name,
    //   'cardinality' => -1,
    //   'settings' => [
    //     'target_type' => 'paragraph',
    //   ],
    // ];

    // $instance_settings = [
    //   'label' => 'Test Paragraph',
    //   'description' => '',
    //   'required' => FALSE,
    //   'handler' => 'default:paragraph',
    //   'handler_settings' => [
    //     'negate' => 0,
    //     'target_bundles' => [
    //       'test_2' => 'test_2'
    //     ],
    //     'target_bundles_drag_drop' => [
    //       'test_2' => [
    //         'enabled' => true,
    //         'weight' => 3,
    //       ],
    //       'test_1' => [
    //         'weight' => 4,
    //         'enabled' => false,
    //       ],
    //       'header' => [
    //         'weight' => 5,
    //         'enabled' => false,
    //       ],
    //     ],
    //   ],
    // ];


    // $field_storage = FieldStorageConfig::loadByName('node', $field_machine_name);
    // ksm($field_storage);

    // if (empty($field_storage)) {
    //   $field_storage = FieldStorageConfig::create($storage_settings);
    //   $field_storage->save();
    //   ksm($field_storage);
    // }
    // else {
    //   drupal_set_message('Already created Field storage.');
    // }

    // $field = FieldConfig::loadByName('node', $content_type_machine_name, $field_machine_name);
    // if (empty($field)) {

    //   $field = entity_create('field_config', [
    //     'field_storage' => $field_storage,
    //     'bundle' => $content_type_machine_name,
    //     'label' => $instance_settings['label'],
    //     'settings' => $instance_settings,
    //   ]);
    //   $field->save();
    // }

    // ksm($field);

    // // Assign widget settings for the 'default' form mode.
    // entity_get_form_display('node', $content_type_machine_name, 'default')
    //   ->setComponent($field_machine_name, [
    //     'type' => 'entity_reference_paragraphs',
    //     'weight' => -50,
    //     'settings' => [
    //       'title' => 'Paragraph',
    //       'title_plural' => 'Paragraphs',
    //       'edit_mode' => 'preview',
    //       'add_mode' => 'dropdown',
    //       'form_display_mode' => 'preview',
    //       'default_paragraph_type' => '_none',
    //     ],
    //   ])
    //   ->save();

    // // Assign display settings for the 'default' and 'teaser' view modes.
    // entity_get_display('node', $content_type_machine_name, 'default')
    //   ->setComponent($field_machine_name, [
    //     'weight' => -50,
    //     'label' => 'hidden',
    //     'type' => 'entity_reference_revisions_entity_view',
    //     'settings' => [
    //       'view_mode' => 'default',
    //     ],
    //   ])
    //   ->save();



















    // $test1 = "1";
    // $test2 = "bob";

    // if (is_numeric ($test1)) {
    //   drupal_set_message("1They Equal");
    // }
    // else {
    //   drupal_set_message("1Not Equal");
    // }

    // if (is_numeric($test2)) {
    //   drupal_set_message("2They Equal");
    // } else {
    //   drupal_set_message("2Not Equal");
    // }

    return [];
  }
}