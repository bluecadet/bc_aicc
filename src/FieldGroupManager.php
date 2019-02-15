<?php

namespace Drupal\bc_aicc;

class FieldGroupManager {

  private $helper;
  private $defaults;

  /**
   *
   */
  public function __construct() {
    $this->helper = \Drupal::service('bc_aicc:import_helper');
    $this->defaults = \Drupal::service('bc_aicc:defaults');
  }

  /**
   *
   */
  public function processTaxonomyFieldGroupWrappers($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processTaxonomyFieldGroupWrappers");
    // ksm($row);
    $fg_settings = $this->defaults->getFieldGroupWrapperSettings($row, $bundle, ($weight + 50), 'taxonomy_term');
    // ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'taxonomy_term', $import_method, $messages);
  }

  /**
   *
   */
  public function processTaxonomyFieldGroups($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processTaxonomyFieldGroups");
    // ksm($row);
    $fg_settings = $this->defaults->getFieldGroupSettings($row, $bundle, ($weight + 50), 'taxonomy_term');
    // ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'taxonomy_term', $import_method, $messages);
  }

  /**
   *
   */
  public function processParagraphFieldGroupWrappers($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processParagraphFieldGroupWrappers");
    // ksm($row);
    $fg_settings = $this->defaults->getFieldGroupWrapperSettings($row, $bundle, ($weight + 50), 'paragraph');
    // ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'paragraph', $import_method, $messages);
  }

  /**
   *
   */
  public function processParagraphFieldGroups($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processParagraphFieldGroups");
    // ksm($row);
    $fg_settings = $this->defaults->getFieldGroupSettings($row, $bundle, ($weight + 50), 'paragraph');
    // ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'paragraph', $import_method, $messages);
  }

  /**
   *
   */
  public function processContentFieldGroupWrappers($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processContentFieldGroupWrappers");
    // ksm($row);
    $fg_settings = $this->defaults->getFieldGroupWrapperSettings($row, $bundle, ($weight + 50), 'node');
    // ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'node', $import_method, $messages);
  }

  /**
   *
   */
  public function processContentFieldGroups($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processContentFieldGroups");
    $fg_settings = $this->defaults->getFieldGroupSettings($row, $bundle, ($weight + 50), 'node');
    // ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'node', $import_method, $messages);
  }

  /**
   *
   */
  public function processFieldGroup($fg_settings, $entity, $import_method, &$messages) {
    drupal_set_message("processContentFieldGroups");
    // ksm($fg_settings);

    // Check if field_group exists.
    $field_group = field_group_load_field_group($fg_settings['group_name'], $entity, $fg_settings['bundle'], 'form', 'default');
    // ksm($field_group);

    if (empty($field_group)) {
      // Create new group.
      $new_group = (object) [
        'group_name' => $fg_settings['group_name'],
        'entity_type' => $entity,
        'bundle' => $fg_settings['bundle'],
        'mode' => 'default',
        'context' => 'form',
        'children' => $fg_settings['children'],
        'parent_name' => $fg_settings['parent_name'],
        'weight' => $fg_settings['weight'],
        'format_type' => $fg_settings['format_type'],
        'label' => $fg_settings['label'],
        'format_settings' => $fg_settings['format_settings'],
      ];

      field_group_group_save($new_group);

      // ksm('new_group', $new_group);

      $messages[] = t("Field group: %name created.", ['%name' => $fg_settings['label']]);
    }
    else {
      drupal_set_message("Import Method: " . $import_method);
      switch ($import_method) {
        case 'nothing':

          // Update Parents, Children and weight.
          $field_group->parent_name = $fg_settings['parent_name'];
          $field_group->children = $fg_settings['children'];
          $field_group->weight = $fg_settings['weight'];

          field_group_group_save($field_group);

          $messages[] = t("Field group: %name already exists. Updateing Parent, children and weight only.", ['%name' => $fg_settings['label']]);
          break;

        case 'update':

          $messages[] = t("Field group: %name already exists. Trying to update. (NOT YET IMPLEMENTED)", ['%name' => $fg_settings['label']]);
          break;

        case 'wipe':
          $messages[] = t("Field group: %name already exists.", ['%name' => $fg_settings['label']]);
          break;
      }
    }
  }

  /**
   *
   */
  public function buildFieldGroupStructure($row_key, $id_key, $raw_data, $new_data, &$fg_structure, $keys = []) {
    static $current_bundle = '';

    // ksm($row_key, $id_key);

    $parent_name = '';
    if (count($keys) > 1 ) {

      $finder = array_slice($keys, 0, -1);
      $finder[] = 'group_name';

      $parent_name = $this->helper->getDepthValue($fg_structure, $finder);
    }

    if ($raw_data[$row_key][0] == 'FGW_START') {
      $keys[] = $current_bundle . ":" . $new_data[$row_key]['group_name'];

      $this->helper->setDepthValue($fg_structure, $keys, [
        'row' => $row_key,
        'bundle' => $current_bundle,
        'group_name' => $new_data[$row_key]['group_name'],
        'parent_name' =>  $parent_name,
        'children' => [],
      ]);

      $keys[] = 'children';

      $this->buildFieldGroupStructure(($row_key + 1), $id_key, $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FG_START') {
      $keys[] = $current_bundle . ":" . $new_data[$row_key]['group_name'];

      $this->helper->setDepthValue($fg_structure, $keys, [
        'row' => $row_key,
        'bundle' => $current_bundle,
        'group_name' => $new_data[$row_key]['group_name'],
        'parent_name' => $parent_name,
        'children' => [],
      ]);

      $keys[] = 'children';

      $this->buildFieldGroupStructure(($row_key + 1), $id_key, $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FGW_END') {
      array_pop($keys);
      array_pop($keys);
      $this->buildFieldGroupStructure(($row_key + 1), $id_key, $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FG_END') {
      array_pop($keys);
      array_pop($keys);
      $this->buildFieldGroupStructure(($row_key + 1), $id_key, $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'BUNDLE') {
      $current_bundle = $new_data[$row_key][$id_key];
      $this->buildFieldGroupStructure(($row_key + 1), $id_key, $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FIELD') {

      if (!empty($keys)) {
        $keys[] = $current_bundle . ":" . $new_data[$row_key]['machine_name'];

        $this->helper->setDepthValue($fg_structure, $keys, [
          'group_name' => $new_data[$row_key]['machine_name']
        ]);
        array_pop($keys);
      }

      $this->buildFieldGroupStructure(($row_key + 1), $id_key, $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'END') {
      return;
    }
    elseif (isset($raw_data[($row_key + 1)])) {
      $this->buildFieldGroupStructure(($row_key + 1), $id_key, $raw_data, $new_data, $fg_structure, $keys);
    }
  }

  /**
   *
   */
  public function setFieldGroupData($fg_structure, &$new_data) {
    static $depth_counter = 1;
    // ksm($depth_counter, $fg_structure, $new_data);

    $depth_counter++;
    foreach ($fg_structure as $paragraph_id => $p_data) {
      if (isset($p_data['row'])) {
        $new_data[$p_data['row']]['parent_name'] = $p_data['parent_name'];
        $new_data[$p_data['row']]['bundle'] = $p_data['bundle'];
        $new_data[$p_data['row']]['children'] = array_column($p_data['children'], 'group_name');

        if (isset($p_data['children']) && !empty($p_data['children'])) {
          $this->setFieldGroupData($p_data['children'], $new_data);
        }
      }
    }
  }
}