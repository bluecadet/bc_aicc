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

use Drupal\bc_aicc\ImportHelper;

/**
 *
 */
function setPlaceHolders(&$placeholders, $string) {
  preg_match_all('/(\[[^\[\]]*\])/', $string, $matches);
  // ksm($matches);

  if (!empty($matches[0])) {
    $p_key = "#PLACEHOLDER" . (count($placeholders) + 1);
    $placeholders[$p_key] = $matches[0][0];
    // ksm($string);

    $string = str_replace($matches[0][0], $p_key, $string);
    // ksm($string);
    $string = setPlaceHolders($placeholders, $string);
  }

  return $string;
}

function ps($val) {

  $altered_val = $val;

  $placeholders = [];
  $altered_val = setPlaceHolders($placeholders, $altered_val);

  // ksm($placeholders);
  // drupal_set_message($altered_val);

  return ps2($altered_val, $placeholders);
}

function ps2($val, $placeholders) {

  $data = [];

  $d1 = explode(";", $val);
  foreach ($d1 as $d) {
    if (!empty($d)) {
      $d2 = explode(":", $d);
      if (!empty($d2)) {
        // ksm($d2, substr($d2[1], 0, 1), substr($d2[1], -1));

        if (count($d2) == 1) {
          $data[] = is_numeric($d2[0]) ? ($d2[0] + 0) : $d2[0];
        }
        else if (isset($placeholders[$d2[1]])) {
          // drupal_set_message("H", 'status', TRUE);

          $data[$d2[0]] = ps2(substr($placeholders[$d2[1]], 1, -1), $placeholders);
        }
        else {
          $data[$d2[0]] = is_numeric($d2[1]) ? ($d2[1] + 0) : $d2[1];
        }
      }
    }
  }

  return $data;
}

class Test extends ControllerBase {

  public function viewTest() {

    // $field_group = field_group_load_field_group('fg_wrapper_tab', 'node', 'fg_tests', 'form', 'default');
    // ksm($field_group);
    // $field_group->children[] = 'field_link_2';
    // field_group_group_save($field_group);

    // $b1 = [
    //   'entity_type' => '',
    //   'type' => '',
    //   'field_name' => '',
    //   'cardinality' => 1,
    //   'settings' => [],
    // ];

    // $b2 = [
    //   'cardinality' => -1,
    //   'settings' => [
    //     'bob' => 1,
    //   ],
    // ];

    // $b3 = [
    //   'settings' => [
    //     'fred' => 1,
    //   ],
    // ];

    // $b4 = array_replace_recursive($b1, $b2, $b3);

    // ksm($b4);


    // $str1 = 'id:id-1;classes:something something2;direction:vertical';
    // $str2 = 'id:id-1;classes:something something2;vertical';
    // $str3 = 'id:id-1;classes:something something2;vertical:';
    // $str6 = 'allowed_formats:[hide_help:1;hide_guidelines:1;something:[1;2;bob:3]]';
    // $str7 = 'allowed_formats:[hide_help:1;hide_guidelines:1;something:[1;2;bob:3]];another_array:[1;2:2;3;4]';
    // $str8 = 'timezone_override:America/New_York;format_type:Y-m-d\TH:i:s;separator:-';

    // $ih = new ImportHelper();

    // ksm('result:', $ih->explodeSettingsField($str1));
    // ksm('result:', $ih->explodeSettingsField($str2));
    // ksm('result:', $ih->explodeSettingsField($str3));
    // ksm('result:', $ih->explodeSettingsField($str6));
    // ksm('result:', $ih->explodeSettingsField($str7));
    // ksm('result:', $ih->explodeSettingsField($str8));

    // ksm(ps($str1));
    // ksm(ps($str2));
    // ksm(ps($str3));
    // ksm(ps($str6));
    // ksm(ps($str7));

    // $array = [
    //   'test1' => [
    //     'test2' => 'BOB',
    //     'test3' => 'BOB',
    //   ],
    // ];

    // print json_encode($array);
    // $array2 = [];

    // $keys = ['test1', 'test2'];


    // $current = &$array;
    // foreach ($keys as $key) {
    //   $current = &$current[$key];
    // }
    // // $current = $value;
    // ksm($current);
    // ksm($array);


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