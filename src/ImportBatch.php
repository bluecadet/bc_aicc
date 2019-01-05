<?php

namespace Drupal\bc_aicc;

use Drupal\bc_aicc\BCDefaults;
use Drupal\bc_aicc\ImportHelper;
use Drupal\bc_aicc\ImportMapper;
use Drupal\file\Entity\File;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\node\Entity\NodeType;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\paragraphs\Entity\ParagraphsType;
use Drupal\taxonomy\Entity\Term;
use Drupal\taxonomy\Entity\Vocabulary;


class ImportBatch {

  private $helper;
  private $defaults;
  private $mapper;

  function __construct() {
    $this->helper = \Drupal::service('bc_aicc:import_helper');
    $this->defaults = \Drupal::service('bc_aicc:defaults');
    $this->mapper = \Drupal::service('bc_aicc:import_mapper');
  }

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

  public function buildTaxonomyData($file, &$context) {
    ksm("Start buildTaxonomyData");
    ksm($context, $file);

    $data = $this->buildTaxonomyDataFromFile($file);

    $context['results']['taxonomy_fid'] = $file->id();
    $context['results']['valid_taxonomy_file'] = TRUE;
    $context['results']['taxonomy_data'] = $data;

    $context['results']['build']['msg'][] = "Taxonomy Data has been built.";
    $context['message'] = "Taxonomy Data has been built.";
  }

  public function buildParagraphsData($file, &$context) {
    ksm("Start buildParagraphsData");
    ksm($context, $file);

    $data = $this->buildParagraphsDataFromFile($file);

    $context['results']['paragraphs_fid'] = $file->id();
    $context['results']['valid_paragraphs_file'] = TRUE;
    $context['results']['paragraphs_data'] = $data;

    $context['results']['build']['msg'][] = "Paragraphs Data has been built.";
    $context['message'] = "Paragraphs Data has been built.";
  }

  public function buildContentData($file, &$context) {
    // ksm("Start buildData");
    // ksm($context, $file, $import_method);

    $data = $this->buildContentDataFromFile($file);

    $context['results']['content_fid'] = $file->id();
    $context['results']['valid_content_file'] = TRUE;
    $context['results']['content_data'] = $data;
    $context['message'] = "Content Data has been built.";
  }

  public function validateTaxonomyData(&$context) {
    ksm("Start validateData");
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

  public function validateParagraphsData(&$context) {
    ksm("Start validateParagraphsData");
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

  public function processTaxonomyData($pass, &$context) {
    ksm("Start processTaxonomyData");
    ksm($context);

    if (empty($context['sandbox'])) {
      // If there is no valid file... just keep going.
      if (!$context['results']['valid_taxonomy_file']) {
        $context['results']['process']['msg'][] = 'Skipping Process.';
        return;
      }

      // $context['sandbox']['progress'] = 0;
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
        if (!empty($current_raw_row[0])) {
          $context['sandbox']['current_bundle'] = $current_row['vid'];

          if ($pass == 'entity') {
            $this->processVocabularyType($current_row, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field.
        else {
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

  public function processTaxonomyTerms(&$context) {
    ksm("Start processTaxonomyTerms");
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
      for ($j=0; $j < count($context['results']['taxonomy_data']['raw_data']); $j++) {
        $current_raw_row = $context['results']['taxonomy_data']['raw_data'][$j];
        $current_row = $context['results']['taxonomy_data']['processed_data'][$j];

        // Find Terms.
        if (!empty($current_raw_row[0])) {
          $vid = $current_row['vid'];

          ksm($current_row['terms']);

          foreach( $current_row['terms'] as $k => $r) {
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

  public function processParagrpahsData($pass, &$context) {
    ksm("Start processParagrpahsData");
    ksm($context);

    if (empty($context['sandbox'])) {
      // $context['sandbox']['progress'] = 0;
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
        if (!empty($current_raw_row[0])) {
          $context['sandbox']['current_bundle'] = $current_row['id'];

          if ($pass == 'entity') {
            $this->processParagraphBundle($current_row, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field.
        else {
          if ($pass == 'field') {
            $this->processParagraphFields($current_row, $context['sandbox']['current_bundle'], $i, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
      }

      $context['sandbox']['current_row'] = $i + 1;
      $c++;
    }

    $context['finished'] = $context['sandbox']['current_row'] / $context['sandbox']['max'];
    $context['message'] = "Processing Paragraph Data: " . $pass;
  }

  public function processContentData($pass, &$context) {
    ksm("Start processContentData");
    ksm($context);

    if (empty($context['sandbox'])) {
      // $context['sandbox']['progress'] = 0;
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
        if (!empty($current_raw_row[0])) {
          $context['sandbox']['current_bundle'] = $current_row['bundle'];

          if ($pass == 'entity') {
            $this->processNodeBundle($current_row, $context['results']['import_method'], $context['results']['process']['msg']);
          }
        }
        // Process Field.
        else {
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

  public function cleanUp(&$context) {
    ksm("Start removeFile");
    ksm($context);

    file_delete($context['results']['content_fid']);
    $context['results']['cleanup']['msg'][] = 'Content CSV File marked for deletion.';
    $context['message'] = "Cleaning up.";
  }




  public function importFinished($success, $results, $operations) {
    ksm("Start importFinished");
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
      // $msgs[] = 'Import Method: ' . $results['import_method'];

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







  protected function setTaxonomyKeysAndProcess($data) {
    $new_data = [];

    foreach ($data as $row) {
      if (!empty($row[0])) {
        $row = $this->mapper->setKeysAndProcessTaxonomyType($row);
      }
      else {
        $row = $this->mapper->setKeysAndProcessTaxonomyField($row);
      }
      $new_data[] = $row;
    }

    return $new_data;
  }

  protected function setParagraphKeysAndProcess($data) {
    $new_data = [];

    foreach ($data as $row) {
      if (!empty($row[0])) {
        $row = $this->mapper->setKeysAndProcessParagraphBundle($row);
      }
      else {
        $row = $this->mapper->setKeysAndProcessParagraphField($row);
      }
      $new_data[] = $row;
    }

    return $new_data;
  }

  protected function setContentKeysAndProcess($data) {
    $new_data = [];

    foreach ($data as $row) {
      if (!empty($row[0])) {
        $row = $this->mapper->setKeysAndProcessNodeBundle($row);
      }
      else {
        $row = $this->mapper->setKeysAndProcessNodeField($row);
      }
      $new_data[] = $row;
    }

    return $new_data;
  }

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

  protected function processNodeBundle($row, $import_method, &$messages) {
    // Check if Content Type exists.
    $node_type = NodeType::load($row['bundle']);

    // If not, add it.
    if (empty($node_type)) {
      $content_type = NodeType::create( [
        'type' => $row['bundle'],
        'name' => $row['name'],
        'description' => $row['description'],
        'title_label' => $row['title_label'],
        'preview_mode' => $row['preview_mode'],
        'help' => $row['help'],
        'new_revision' => $row['new_revision'],
        'display_submitted' => $row['display_submitted'],
      ]);

      // Menu
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

  protected function processParagraphBundle($row, $import_method, &$messages) {
    // Check if Content Type exists.
    $para_type = ParagraphsType::load($row['id']);

    // If not, add it.
    if (empty($para_type)) {
      $para_type = ParagraphsType::create( [
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

  protected function processTaxonomyFields($row, $bundle, $weight, $import_method, &$messages) {
    $this->processFields($row, $bundle, $weight, $import_method, $messages, 'taxonomy_term');
  }

  protected function processParagraphFields($row, $bundle, $weight, $import_method, &$messages) {
    $this->processFields($row, $bundle, $weight, $import_method, $messages, 'paragraph');
  }

  protected function processContentFields($row, $bundle, $weight, $import_method, &$messages) {
    $this->processFields($row, $bundle, $weight, $import_method, $messages, 'node');
  }

  protected function processFields($row, $bundle, $weight, $import_method, &$messages, $entity) {
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
      $field = entity_create('field_config', [
        'field_storage' => $field_storage,
        'bundle' => $bundle,
        'label' => $instance_settings['label'],
        'settings' => $instance_settings,
      ]);
      $field->save();
      ksm($field);

      $messages[] = t("Field instance: %name created.", ['%name' => $row['name']]);

      // Assign widget settings for the 'default' form mode.
      entity_get_form_display($entity, $bundle, 'default')
        ->setComponent($field_machine_name, $form_settings)
        ->save();

      // Assign display settings for the 'default' and 'teaser' view modes.
      entity_get_display($entity, $bundle, 'default')
        ->setComponent($field_machine_name, $display_settings)
        ->save();

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





  public function buildTaxonomyDataFromFile($file) {
    return $this->buildDataFromFile($file, 'setTaxonomyKeysAndProcess');
  }

  public function buildParagraphsDataFromFile($file) {
    return $this->buildDataFromFile($file, 'setParagraphKeysAndProcess');
  }

  public function buildContentDataFromFile($file) {
    return $this->buildDataFromFile($file, 'setContentKeysAndProcess');
  }

  public function buildDataFromFile($file, $process_func) {
    $real_path = \Drupal::service('file_system')->realpath($file->getFileUri());

    $fp = fopen($real_path, 'r');
    $raw_data = [];
    $row = 0;
    $bundles = 0;
    $fields = 0;

    while (($import_row = fgetcsv($fp, 0, ",")) !== false) {
      if ($row > 2) {
        $raw_data[] = $import_row;

        if (empty($import_row[0])) {
          $fields++;
        } else {
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

}
