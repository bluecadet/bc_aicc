<?php

namespace Drupal\bc_aicc;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\node\Entity\NodeType;
use Drupal\paragraphs\Entity\ParagraphsType;
use Drupal\taxonomy\Entity\Term;
use Drupal\taxonomy\Entity\Vocabulary;

/**
 *
 */
class ImportBatch {

  private $helper;
  private $defaults;
  private $mapper;

  /**
   *
   */
  public function __construct() {
    $this->helper = \Drupal::service('bc_aicc:import_helper');
    $this->defaults = \Drupal::service('bc_aicc:defaults');
    $this->mapper = \Drupal::service('bc_aicc:import_mapper');
  }

  /**
   *
   */
  public function initiateVariables($import_method, &$context) {
    $context['results']['taxonomy_fid'] = NULL;
    $context['results']['valid_taxonomy_file'] = TRUE;
    $context['results']['taxonomy_data'] = NULL;
    $context['results']['paragraphs_fid'] = NULL;
    $context['results']['valid_paragraphs_file'] = TRUE;
    $context['results']['paragraphs_data'] = NULL;
    $context['results']['content_fid'] = NULL;
    $context['results']['valid_content_file'] = TRUE;
    $context['results']['content_data'] = NULL;
    $context['results']['import_method'] = $import_method;

    $context['results']['build']['msg'] = [];
    $context['results']['validate']['msg'] = [];
    $context['results']['process']['msg'] = [];
    $context['results']['cleanup']['msg'] = [];

    $context['message'] = "Variables have been set";
  }

  /**
   *
   */
  public function buildTaxonomyData($file, &$context) {
    drupal_set_message("Start buildTaxonomyData");
    ksm($context, $file);

    $data = $this->buildTaxonomyDataFromFile($file);

    $context['results']['taxonomy_fid'] = $file->id();
    $context['results']['valid_taxonomy_file'] = TRUE;
    $context['results']['taxonomy_data'] = $data;

    $context['results']['build']['msg'][] = "Taxonomy Data has been built.";
    $context['message'] = "Taxonomy Data has been built.";
  }

  /**
   *
   */
  public function buildParagraphsData($file, &$context) {
    drupal_set_message("Start buildParagraphsData");
    ksm($context, $file);

    $data = $this->buildParagraphsDataFromFile($file);

    $context['results']['paragraphs_fid'] = $file->id();
    $context['results']['valid_paragraphs_file'] = TRUE;
    $context['results']['paragraphs_data'] = $data;

    $context['results']['build']['msg'][] = "Paragraphs Data has been built.";
    $context['message'] = "Paragraphs Data has been built.";
  }

  /**
   *
   */
  public function buildContentData($file, &$context) {
    // drupal_set_message("Start buildData");
    // ksm($context, $file, $import_method);.
    $data = $this->buildContentDataFromFile($file);

    $context['results']['content_fid'] = $file->id();
    $context['results']['valid_content_file'] = TRUE;
    $context['results']['content_data'] = $data;
    $context['message'] = "Content Data has been built.";
  }

  /**
   *
   */
  public function validateTaxonomyData(&$context) {
    drupal_set_message("Start validateData");
    ksm($context);

    // Validate csv file.
    //  - third row, first Col should start new Vocab.
    if (empty($context['results']['taxonomy_data']['raw_data'][0][0])) {
      $context['results']['validate']['msg'][] = 'Taxonomy File Does not Validate';
      $context['results']['valid_taxonomy_file'] = FALSE;
      return;
    }

    $context['results']['validate']['msg'][] = 'CSV Taxonomy File Validated';
    $context['message'] = "CSV Taxonomy File Validated";
  }

  /**
   *
   */
  public function validateParagraphsData(&$context) {
    drupal_set_message("Start validateParagraphsData");
    ksm($context);

    // Validate csv file.
    //  - third row, first Col should start new Paragraph Bundle.
    if (empty($context['results']['paragraphs_data']['raw_data'][0][0])) {
      $context['results']['validate']['msg'][] = 'File Does not Validate';
      $context['results']['valid_paragraphs_file'] = FALSE;
      return;
    }

    $context['results']['validate']['msg'][] = 'CSV Paragraphs File Validated';
    $context['message'] = "CSV Paragraphs File Validated";
  }

  /**
   *
   */
  public function validateContentData(&$context) {
    ksm("Start validateData");
    ksm($context);

    // Validate csv file.
    //  - third row, first Col should start new Content type.
    if (empty($context['results']['content_data']['raw_data'][0][0])) {
      $context['results']['validate']['msg'][] = 'File Does not Validate';
      $context['results']['valid_content_file'] = FALSE;
      return;
    }

    $context['results']['validate']['msg'][] = 'CSV File Validated';
    $context['message'] = "CSV File Validated";
  }

  /**
   *
   */
  public function processTaxonomyData($pass, &$context) {
    drupal_set_message("Start processTaxonomyData");
    ksm($context);

    if (empty($context['sandbox'])) {
      // If there is no valid file... just keep going.
      if (!$context['results']['valid_taxonomy_file']) {
        $context['results']['process']['msg'][] = 'Skipping Process.';
        return;
      }

      // $context['sandbox']['progress'] = 0;.
      $context['sandbox']['current_row'] = 0;
      $context['sandbox']['current_bundle'] = '';
      $context['sandbox']['max'] = $context['results']['taxonomy_data']['stats']['total_rows'];
    }

    $c = 0;
    $start_row = $context['sandbox']['current_row'];
    while ($c < 5) {
      $i = ($start_row + $c);
      if (isset($context['results']['taxonomy_data']['raw_data'][$i])) {
        $current_raw_row = $context['results']['taxonomy_data']['raw_data'][$i];
        $current_row = $context['results']['taxonomy_data']['processed_data'][$i];

        // Process Bundle.
        if ($current_raw_row[0] == 'BUNDLE' || !empty($current_raw_row[1])) {
          $context['sandbox']['current_bundle'] = $current_row['vid'];

          if ($pass == 'entity') {
            $this->processVocabularyType($current_row, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field.
        elseif ($current_raw_row[0] == 'FIELD') {
          if ($pass == 'field') {
            $this->processTaxonomyFields($current_row, $context['sandbox']['current_bundle'], $i, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
      }

      $context['sandbox']['current_row'] = $i + 1;
      $c++;
    }

    $context['finished'] = $context['sandbox']['current_row'] / $context['sandbox']['max'];

    $context['message'] = "Processing Taxonomy Data: " . $pass;
  }

  /**
   *
   */
  public function processTaxonomyTerms(&$context) {
    drupal_set_message("Start processTaxonomyTerms");
    ksm($context);

    if (empty($context['sandbox'])) {
      // If there is no valid file... just keep going.
      if (!$context['results']['valid_taxonomy_file']) {
        $context['results']['process']['msg'] = 'Skipping Process. Invalid Taxonomy CSV File.';
        $context['message'] = "Skipping Process. Invalid Taxonomy CSV File.";
        return;
      }

      $context['sandbox']['current_row'] = 0;
      $context['sandbox']['max'] = 0;

      $terms_to_create = [];
      for ($j = 0; $j < count($context['results']['taxonomy_data']['raw_data']); $j++) {
        $current_raw_row = $context['results']['taxonomy_data']['raw_data'][$j];
        $current_row = $context['results']['taxonomy_data']['processed_data'][$j];

        // Find Terms.
        if (!empty($current_raw_row[0])) {
          $vid = $current_row['vid'];

          ksm($current_row['terms']);

          foreach ($current_row['terms'] as $k => $r) {
            if (!empty($r)) {
              $terms_to_create[] = [
                'name' => $r,
                'vid' => $vid,
                'weight' => $k,
              ];
            }
          }
        }
      }

      $context['sandbox']['terms_to_create'] = $terms_to_create;
      $context['sandbox']['max'] = count($terms_to_create);

      // If nothing to create, stop process.
      if ($context['sandbox']['max'] == 0) {
        $context['results']['process']['msg'][] = 'No terms to import.';
        $context['finished'] = 1;
        return;
      }

      $context['message'] = "Taxonomy Terms ready to import.";
      $context['finished'] = 0;
      return;
    }

    $c = 0;
    $start_row = $context['sandbox']['current_row'];
    while ($c < 5) {
      $i = ($start_row + $c);

      if (isset($context['sandbox']['terms_to_create'][$i])) {

        $props = array_slice($context['sandbox']['terms_to_create'][$i], 0, 2, TRUE);
        $terms = \Drupal::entityManager()->getStorage('taxonomy_term')->loadByProperties($props);

        if (empty($terms)) {

          $new_term = Term::create($context['sandbox']['terms_to_create'][$i]);

          $new_term->enforceIsNew();
          $new_term->save();

          $context['results']['process']['msg'][] = t('Created term: %term.', ['%term' => $new_term->label()]);
        }
        else {
          $context['results']['process']['msg'][] = t('Term Exists: %term.', ['%term' => $context['sandbox']['terms_to_create'][$i]['name']]);
        }
      }

      $context['sandbox']['current_row'] = $i + 1;
      $c++;
    }

    $context['message'] = "Importing Taxonomy Terms.";
    $context['finished'] = $context['sandbox']['current_row'] / $context['sandbox']['max'];
  }

  /**
   *
   */
  public function processParagraphsData($pass, &$context) {
    drupal_set_message("Start processParagraphsData");
    ksm($context);

    if (empty($context['sandbox'])) {
      // $context['sandbox']['progress'] = 0;.
      $context['sandbox']['current_row'] = 0;
      $context['sandbox']['current_bundle'] = '';
      $context['sandbox']['max'] = $context['results']['paragraphs_data']['stats']['total_rows'];

      // If there is no valid file... just keep going.
      if (!$context['results']['valid_paragraphs_file']) {
        $context['results']['process']['msg'][] = 'Skipping Paragraph Process.';
        return;
      }
    }

    $c = 0;
    $start_row = $context['sandbox']['current_row'];
    while ($c < 5) {
      $i = ($start_row + $c);
      if (isset($context['results']['paragraphs_data']['raw_data'][$i])) {
        $current_raw_row = $context['results']['paragraphs_data']['raw_data'][$i];
        $current_row = $context['results']['paragraphs_data']['processed_data'][$i];

        // Process Bundle.
        if ($current_raw_row[0] == 'BUNDLE' || !empty($current_raw_row[1])) {
          $context['sandbox']['current_bundle'] = $current_row['id'];

          if ($pass == 'entity') {
            $this->processParagraphBundle($current_row, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field.
        elseif ($current_raw_row[0] == 'FIELD') {
          if ($pass == 'field') {
            $this->processParagraphFields($current_row, $context['sandbox']['current_bundle'], $i, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field Group Wrappers.
        elseif ($current_raw_row[0] == 'FGW_START') {
          if ($pass == 'field_groups') {
            $this->processParagraphFieldGroupWrappers($current_row, $context['sandbox']['current_bundle'], $i, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field Groups.
        elseif ($current_raw_row[0] == 'FG_START') {
          if ($pass == 'field_groups') {
            $this->processParagraphFieldGroups($current_row, $context['sandbox']['current_bundle'], $i, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
      }

      $context['sandbox']['current_row'] = $i + 1;
      $c++;
    }

    $context['finished'] = $context['sandbox']['current_row'] / $context['sandbox']['max'];
    $context['message'] = "Processing Paragraph Data: " . $pass;
  }

  /**
   *
   */
  public function processContentData($pass, &$context) {
    ksm("Start processContentData");
    ksm($context);

    if (empty($context['sandbox'])) {
      // $context['sandbox']['progress'] = 0;.
      $context['sandbox']['current_row'] = 0;
      $context['sandbox']['current_bundle'] = '';
      $context['sandbox']['max'] = $context['results']['content_data']['stats']['total_rows'];

      // If there is no valid file... just keep going.
      if (!$context['results']['valid_content_file']) {
        $context['results']['process']['msg'][] = 'Skipping Process.';
        return;
      }
    }

    $c = 0;
    $start_row = $context['sandbox']['current_row'];
    while ($c < 5) {
      $i = ($start_row + $c);
      if (isset($context['results']['content_data']['raw_data'][$i])) {
        $current_raw_row = $context['results']['content_data']['raw_data'][$i];
        $current_row = $context['results']['content_data']['processed_data'][$i];

        // Process Bundle.
        if ($current_raw_row[0] == 'BUNDLE' || !empty($current_raw_row[1])) {
          $context['sandbox']['current_bundle'] = $current_row['bundle'];

          if ($pass == 'entity') {
            $this->processNodeBundle($current_row, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field.
        elseif ($current_raw_row[0] == 'FIELD') {
          if ($pass == 'field') {
            $this->processContentFields($current_row, $context['sandbox']['current_bundle'], $i, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
      }

      $context['sandbox']['current_row'] = $i + 1;
      $c++;
    }

    $context['finished'] = $context['sandbox']['current_row'] / $context['sandbox']['max'];
    $context['message'] = "Processing Content Data: " . $pass;
  }

  /**
   *
   */
  public function cleanUp(&$context) {
    drupal_set_message("Start removeFile");
    ksm($context);

    file_delete($context['results']['content_fid']);
    $context['results']['cleanup']['msg'][] = 'Content CSV File marked for deletion.';
    $context['message'] = "Cleaning up.";
  }

  /**
   *
   */
  public function importFinished($success, $results, $operations) {
    drupal_set_message("Start importFinished");
    ksm($success, $results, $operations);

    if ($success) {
      $msgs = [];

      // Build Step Messages.
      // $msgs[] = \Drupal::translation()->formatPlural(
      //   count($results['data']['stats']['bundles']),
      //   '1 Content Type in Data.',
      //   '@count Content Types in Data.'
      // );
      // $msgs[] = \Drupal::translation()->formatPlural(
      //   count($results['data']['stats']['fields']),
      //   '1 Field in Data.',
      //   '@count Total fields in Data.'
      // );
      // $msgs[] = 'Import Method: ' . $results['import_method'];.
      // Validation Step Messages.
      if (isset($results['build']['msg']) && !empty($results['build']['msg'])) {
        foreach ($results['build']['msg'] as $m) {
          $msgs[] = $m;
        }
      }

      // Validation Step Messages.
      if (isset($results['validate']['msg']) && !empty($results['validate']['msg'])) {
        foreach ($results['validate']['msg'] as $m) {
          $msgs[] = $m;
        }
      }

      // Process step Messages.
      if (isset($results['process']['msg']) && !empty($results['process']['msg'])) {
        foreach ($results['process']['msg'] as $m) {
          $msgs[] = $m;
        }
      }

      // Clean Up step Messages.
      if (isset($results['cleanup']['msg']) && !empty($results['cleanup']['msg'])) {
        foreach ($results['cleanup']['msg'] as $m) {
          $msgs[] = $m;
        }
      }

      $message_render = [
        '#theme' => 'item_list',
        '#items' => $msgs,
      ];

      drupal_set_message(render($message_render));
    }
    else {
      drupal_set_message(t('Finished with an error.'));
    }
  }








  /**
   *
   */
  protected function processVocabularyType($row, $import_method, &$messages) {

    $v = Vocabulary::load($row['vid']);
    if (empty($v)) {
      $v = Vocabulary::create([
        'name' => $row['name'],
        'vid' => $row['vid'],
        'description' => $row['description'],
      ]);
      $v->isNew();
      $v->save();

      $messages[] = t("Vocabulary: %name created.", ['%name' => $row['name']]);
    }
    else {
      switch ($import_method) {
        case 'nothing':
          $messages[] = t("Vocabulary: %name already exists. Doing nothing.", ['%name' => $row['name']]);
          break;

        case 'update':
          $messages[] = t("Vocabulary: %name already exists. Trying to update. (NOT YET IMPLEMENTED)", ['%name' => $row['name']]);
          break;

        case 'wipe':
          $messages[] = t("Vocabulary: %name already exists.", ['%name' => $row['name']]);
          break;
      }
    }
  }

  /**
   *
   */
  protected function processNodeBundle($row, $import_method, &$messages) {
    // Check if Content Type exists.
    $node_type = NodeType::load($row['bundle']);

    // If not, add it.
    if (empty($node_type)) {
      $content_type = NodeType::create([
        'type' => $row['bundle'],
        'name' => $row['name'],
        'description' => $row['description'],
        'title_label' => $row['title_label'],
        'preview_mode' => $row['preview_mode'],
        'help' => $row['help'],
        'new_revision' => $row['new_revision'],
        'display_submitted' => $row['display_submitted'],
      ]);

      // Menu.
      $menus = explode(",", $row['available_menus']);
      $content_type->setThirdPartySetting('menu_ui', 'available_menus', $menus);
      $content_type->setThirdPartySetting('menu_ui', 'parent', $row['parent']);

      $content_type->isNew();
      $content_type->save();

      $fields = \Drupal::service('entity_field.manager')->getFieldDefinitions('node', $row['bundle']);
      $fields['status']->getConfig($row['bundle'])
        ->setDefaultValue($row['status'])
        ->save();

      $fields['promote']->getConfig($row['bundle'])
        ->setDefaultValue($row['promote'])
        ->save();

      $fields['sticky']->getConfig($row['bundle'])
        ->setDefaultValue($row['sticky'])
        ->save();

      $messages[] = "Content Type: " . $row['name'] . ' created.';
    }
    else {
      switch ($import_method) {
        case 'nothing':
          $messages[] = t("Content Type: %name already exists. Doing nothing.", ['%name' => $row['name']]);
          break;

        case 'update':
          $messages[] = t("Content Type: %name already exists. Trying to update. (NOT YET IMPLEMENTED)", ['%name' => $row['name']]);
          break;

        case 'wipe':
          $messages[] = t("Content Type: %name already exists.", ['%name' => $row['name']]);
          break;
      }
    }
  }

  /**
   *
   */
  protected function processParagraphBundle($row, $import_method, &$messages) {
    // Check if Content Type exists.
    $para_type = ParagraphsType::load($row['id']);

    // If not, add it.
    if (empty($para_type)) {
      $para_type = ParagraphsType::create([
        'label' => $row['label'],
        'id' => $row['id'],
        'description' => $row['description'],
      ]);

      $para_type->isNew();
      $para_type->save();

      $messages[] = "Paragraph Bundle: " . $row['label'] . ' created.';
    }
    else {
      switch ($import_method) {
        case 'nothing':
          $messages[] = t("Paragraph Bundle: %label already exists. Doing nothing.", ['%label' => $row['label']]);
          break;

        case 'update':
          $messages[] = t("Paragraph Bundle: %label already exists. Trying to update. (NOT YET IMPLEMENTED)", ['%label' => $row['label']]);
          break;

        case 'wipe':
          $messages[] = t("Paragraph Bundle: %label already exists.", ['%label' => $row['label']]);
          break;
      }
    }
  }

  /**
   *
   */
  protected function processTaxonomyFields($row, $bundle, $weight, $import_method, &$messages) {
    $this->processFields($row, $bundle, $weight, $import_method, $messages, 'taxonomy_term');
  }

  /**
   *
   */
  protected function processParagraphFields($row, $bundle, $weight, $import_method, &$messages) {
    $this->processFields($row, $bundle, $weight, $import_method, $messages, 'paragraph');
  }

  /**
   *
   */
  protected function processContentFields($row, $bundle, $weight, $import_method, &$messages) {
    $this->processFields($row, $bundle, $weight, $import_method, $messages, 'node');
  }

  /**
   *
   */
  protected function processFields($row, $bundle, $weight, $import_method, &$messages, $entity) {
    drupal_set_message("Start processFields", "status", TRUE);
    ksm($row);
    $field_machine_name = $row['machine_name'];

    $storage_settings = $this->defaults->getFieldStorageSettings($row, $entity);
    $instance_settings = $this->defaults->getFieldInstanceSettings($row, $entity);
    ksm($storage_settings, $instance_settings);

    $form_settings = $this->defaults->getFieldFormSettings($row, ($weight + 50), $entity);
    $display_settings = $this->defaults->getFieldDisplaySettings($row, $weight, $entity);
    ksm($form_settings, $display_settings);

    $field_storage = FieldStorageConfig::loadByName($entity, $field_machine_name);
    ksm($field_storage);

    if (empty($field_storage)) {
      $field_storage = FieldStorageConfig::create($storage_settings);
      $field_storage->save();
      ksm($field_storage);
      $messages[] = t("Field storage: %name created.", ['%name' => $row['name']]);
    }
    else {
      switch ($import_method) {
        case 'nothing':
          $messages[] = t("Field storage: %name already exists. Doing nothing.", ['%name' => $row['name']]);
          break;

        case 'update':
          $messages[] = t("Field storage: %name already exists. Trying to update. (NOT YET IMPLEMENTED)", ['%name' => $row['name']]);
          break;

        case 'wipe':
          $messages[] = t("Field storage: %name already exists.", ['%name' => $row['name']]);
          break;
      }
    }

    $field = FieldConfig::loadByName($entity, $bundle, $field_machine_name);
    if (empty($field)) {
      $field_opts = [
        'field_storage' => $field_storage,
        'bundle' => $bundle,
        'label' => $instance_settings['label'],
        'description' => $instance_settings['description'],
        'required' => $instance_settings['required'],
        'settings' => $instance_settings,
      ];

      if (isset($instance_settings['third_party_settings'])) {
        $field_opts['third_party_settings'] = $instance_settings['third_party_settings'];
      }

      $field = entity_create('field_config', $field_opts);
      $field->save();
      ksm($field);

      $messages[] = t("Field instance: %name created.", ['%name' => $row['name']]);

      // Assign widget settings for the 'default' form mode.
      $entity_form_display = entity_get_form_display($entity, $bundle, 'default');
      $entity_form_display->setComponent($field_machine_name, $form_settings);
      if (isset($form_settings['third_party_settings'])) {
        foreach ($form_settings['third_party_settings'] as $tps_module => $tps_settings) {
          foreach ($tps_settings as $tps_key => $tps_value) {
            $entity_form_display->setThirdPartySetting($tps_module, $tps_key, $tps_value);
          }
        }
      }
      $entity_form_display->save();

      // Assign display settings for the 'default' and 'teaser' view modes.
      if ($display_settings['type'] == '-none-') {
        entity_get_display($entity, $bundle, 'default')
          ->removeComponent($field_machine_name)->save();
      }
      else {
        entity_get_display($entity, $bundle, 'default')
          ->setComponent($field_machine_name, $display_settings)
          ->save();
      }
    }
    else {
      switch ($import_method) {
        case 'nothing':
          $messages[] = t("Field instance: %name already exists. Doing nothing.", ['%name' => $row['name']]);
          break;

        case 'update':
          $messages[] = t("Field instance: %name already exists. Trying to update. (NOT YET IMPLEMENTED)", ['%name' => $row['name']]);
          break;

        case 'wipe':
          $messages[] = t("Field instance: %name already exists.", ['%name' => $row['name']]);
          break;
      }
    }
  }

  /**
   *
   */
  protected function processParagraphFieldGroupWrappers($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processParagraphFieldGroupWrappers");
    $fg_settings = $this->defaults->getFieldGroupWrapperSettings($row, $bundle, 'paragraph');
    ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'paragraph', $weight, $messages);
  }

  /**
   *
   */
  protected function processParagraphFieldGroups($row, $bundle, $weight, $import_method, &$messages) {
    drupal_set_message("processParagraphFieldGroups");
    $fg_settings = $this->defaults->getFieldGroupSettings($row, $bundle, 'paragraph');
    ksm($fg_settings);

    $this->processFieldGroup($fg_settings, 'paragraph', $weight, $messages);
  }

  /**
   *
   */
  protected function processFieldGroup($fg_settings, $entity, $weight, &$messages) {

    // Check if field_group exists.
    $field_group = field_group_load_field_group($fg_settings['group_name'], $entity, $fg_settings['bundle'], 'form', 'default');
    ksm($field_group);

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
        'weight' => $weight,
        'format_type' => $fg_settings['format_type'],
        'label' => $fg_settings['label'],
        'format_settings' => $fg_settings['format_settings'],
      ];
      ksm('new_group', $new_group);
      field_group_group_save($new_group);

      $messages[] = t("Field group: %name created.", ['%name' => $fg_settings['label']]);
    }
    else {
      switch ($import_method) {
        case 'nothing':
          $messages[] = t("Field group: %name already exists. Doing nothing.", ['%name' => $fg_settings['label']]);
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
  public function buildTaxonomyDataFromFile($file) {
    return $this->buildDataFromFile($file, 'setTaxonomyKeysAndProcess');
  }

  /**
   *
   */
  public function buildParagraphsDataFromFile($file) {
    return $this->buildDataFromFile($file, 'setParagraphKeysAndProcess');
  }

  /**
   *
   */
  public function buildContentDataFromFile($file) {
    return $this->buildDataFromFile($file, 'setContentKeysAndProcess');
  }

  /**
   *
   */
  public function buildDataFromFile($file, $process_func) {
    $real_path = \Drupal::service('file_system')->realpath($file->getFileUri());

    $fp = fopen($real_path, 'r');
    $raw_data = [];
    $row = 0;
    $bundles = 0;
    $fields = 0;

    while (($import_row = fgetcsv($fp, 0, ",")) !== FALSE) {
      if ($row > 2) {
        $raw_data[] = $import_row;

        if (empty($import_row[0])) {
          $fields++;
        }
        else {
          $bundles++;
        }
      }

      $row++;
    }

    $processed_data = $this->{$process_func}($raw_data);

    return [
      'raw_data' => $raw_data,
      'processed_data' => $processed_data,
      'stats' => [
        'total_rows' => $row - 2,
        'bundles' => $bundles,
        'fields' => $fields,
      ],
    ];
  }

  /**
   *
   */
  protected function setTaxonomyKeysAndProcess($data) {
    $new_data = [];

    foreach ($data as $row) {
      if ($row[0] == 'BUNDLE' || !empty($row[1])) {
        $row = $this->mapper->setKeysAndProcessTaxonomyType($row);
      }
      elseif ($row[0] == 'FIELD') {
        $row = $this->mapper->setKeysAndProcessTaxonomyField($row);
      }
      $new_data[] = $row;
    }

    return $new_data;
  }

  /**
   *
   */
  protected function setParagraphKeysAndProcess($data) {
    $new_data = [];

    foreach ($data as $k => $row) {
      if ($row[0] == 'BUNDLE' || !empty($row[1])) {
        $new_row = $this->mapper->setKeysAndProcessParagraphBundle($row);
      }
      elseif ($row[0] == 'FIELD') {
        $new_row = $this->mapper->setKeysAndProcessParagraphField($row);
      }
      elseif ($row[0] == 'FGW_START') {
        $new_row = $this->mapper->setKeysAndProcessParagraphFieldGroupWrapper($row);
      }
      elseif ($row[0] == 'FG_START') {
        $new_row = $this->mapper->setKeysAndProcessParagraphFieldGroup($row);
      }
      $new_data[] = $new_row;
    }

    // Process Field Group Structure.
    drupal_set_message("Process Field Group Structure.");
    ksm($new_data);

    $fg_structure = [];

    $this->buildFieldGroupStructure(0, $data, $new_data, $fg_structure);
    ksm($fg_structure);

    $this->setFieldGroupData($fg_structure, $new_data);
    ksm($new_data);

    return $new_data;
  }

  /**
   *
   */
  protected function setContentKeysAndProcess($data) {
    $new_data = [];

    foreach ($data as $row) {
      if ($row[0] == 'BUNDLE' || !empty($row[1])) {
        $row = $this->mapper->setKeysAndProcessNodeBundle($row);
      }
      elseif ($row[0] == 'FIELD') {
        $row = $this->mapper->setKeysAndProcessNodeField($row);
      }
      $new_data[] = $row;
    }

    return $new_data;
  }

  /**
   *
   */
  protected function buildFieldGroupStructure($row_key, $raw_data, $new_data, &$fg_structure, $keys = []) {
    static $current_bundle = '';

    if ($raw_data[$row_key][0] == 'FGW_START') {
      $keys[] = $new_data[$row_key]['group_name'];

      $this->helper->setDepthValue($fg_structure, $keys, [
        'row' => $row_key,
        'bundle' => $current_bundle,
        'parent_name' => isset($keys[count($keys) - 3]) ? $keys[count($keys) - 3] : '',
        'children' => [],
      ]);

      $keys[] = 'children';

      $this->buildFieldGroupStructure(($row_key + 1), $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FG_START') {
      $keys[] = $new_data[$row_key]['group_name'];

      $this->helper->setDepthValue($fg_structure, $keys, [
        'row' => $row_key,
        'bundle' => $current_bundle,
        'parent_name' => isset($keys[count($keys) - 3]) ? $keys[count($keys) - 3] : '',
        'children' => [],
      ]);

      $keys[] = 'children';

      $this->buildFieldGroupStructure(($row_key + 1), $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FGW_END') {
      array_pop($keys);
      array_pop($keys);
      $this->buildFieldGroupStructure(($row_key + 1), $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FG_END') {
      array_pop($keys);
      array_pop($keys);
      $this->buildFieldGroupStructure(($row_key + 1), $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'BUNDLE') {
      $current_bundle = $new_data[$row_key]['id'];
      $this->buildFieldGroupStructure(($row_key + 1), $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif ($raw_data[$row_key][0] == 'FIELD') {

      if (!empty($keys)) {
        $keys[] = $new_data[$row_key]['machine_name'];
        $this->helper->setDepthValue($fg_structure, $keys, $new_data[$row_key]['machine_name']);
        array_pop($keys);
        // $this->helper->addDepthValue($fg_structure, $keys, $new_data[$row_key]['machine_name']);.
      }

      $this->buildFieldGroupStructure(($row_key + 1), $raw_data, $new_data, $fg_structure, $keys);
    }
    elseif (isset($raw_data[($row_key + 1)])) {
      $this->buildFieldGroupStructure(($row_key + 1), $raw_data, $new_data, $fg_structure, $keys);
    }
  }

  /**
   *
   */
  protected function setFieldGroupData($fg_structure, &$new_data) {

    foreach ($fg_structure as $paragraph_id => $p_data) {
      $new_data[$p_data['row']]['parent_name'] = $p_data['parent_name'];
      $new_data[$p_data['row']]['bundle'] = $p_data['bundle'];
      $new_data[$p_data['row']]['children'] = array_keys($p_data['children']);

      if (isset($p_data['children']) && !empty($p_data['children'])) {
        $this->setFieldGroupData($p_data['children'], $new_data);
      }
    }
  }

}
