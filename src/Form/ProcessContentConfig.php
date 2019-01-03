<?php

namespace Drupal\bc_aicc\Form;

use Drupal\bc_aicc\ImportBatch;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\node\Entity\NodeType;


class ProcessContentConfig extends FormBase {

  public $importer;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'bc_process_content';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['message'] = [
      '#markup' => 'IMPORT IT ALL!!!'
    ];

    $form['csv_taxonomy_upload'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Choose a csv file for Taxonomy'),
      '#upload_location' => 'private://config_import/taxonomy',
      '#upload_validators' => [
        'file_validate_extensions' => ['csv'],
      ],
    ];

    $form['csv_paragraphs_upload'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Choose a csv file for Paragraphs'),
      '#upload_location' => 'private://config_import/paragraphs',
      '#upload_validators' => [
        'file_validate_extensions' => ['csv'],
      ],
    ];

    $form['csv_content_upload'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Choose a csv file for Content (node)'),
      '#upload_location' => 'private://config_import/content',
      '#upload_validators' => [
        'file_validate_extensions' => ['csv'],
      ],
    ];

    $form['import_method'] = [
      '#type' => 'radios',
      '#title' => $this->t('Import method'),
      '#options' => [
        'nothing' => 'Do nothing if exists',
        // 'update' => 'Force Update',
        // 'wipe' => 'Wipe and import',
      ],
      '#default_value' => 'nothing',
      '#required' => TRUE,
    ];

    $form['import_method2'] = [
      '#type' => 'radios',
      '#title' => $this->t('Import method'),
      '#title_display' => 'invisible',
      '#options' => [
        // 'nothing' => 'Do nothing if exists',
        'update' => 'Force Update',
        'wipe' => 'Wipe and import',
      ],
      '#default_value' => '',
      // '#required' => TRUE,
      '#disabled' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Import'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $import_method = $form_state->getValue('import_method', 'nothing');
    $this->importer = new ImportBatch();

    $ops = [
      [[$this->importer, 'initiateVariables'], [$import_method]],
    ];

    $form_file1 = $form_state->getValue('csv_taxonomy_upload', 0);
    if (isset($form_file1[0]) && !empty($form_file1[0])) {
      $tax_file = File::load($form_file1[0]);
      $tax_file->setPermanent();
      $tax_file->save();

      $ops[] = [[$this->importer, 'buildTaxonomyData'], [$tax_file]];
      $ops[] = [[$this->importer, 'validateTaxonomyData'], []];
      $ops[] = [[$this->importer, 'processTaxonomyData'], []];
      $ops[] = [[$this->importer, 'processTaxonomyTerms'], []];
    }

    $form_file2 = $form_state->getValue('csv_paragraphs_upload', 0);
    if (isset($form_file2[0]) && !empty($form_file2[0])) {
      $para_file = File::load($form_file2[0]);
      $para_file->setPermanent();
      $para_file->save();

      $ops[] = [[$this->importer, 'buildParagraphsData'], [$para_file]];
      $ops[] = [[$this->importer, 'validateParagraphsData'], []];
      $ops[] = [[$this->importer, 'processParagrpahsData'], []];
    }

    $form_file3 = $form_state->getValue('csv_content_upload', 0);
    if (isset($form_file3[0]) && !empty($form_file3[0])) {
      $content_file = File::load($form_file3[0]);
      $content_file->setPermanent();
      $content_file->save();

      $ops[] = [[$this->importer, 'buildContentData'], [$content_file]];
      $ops[] = [[$this->importer, 'validateContentData'], []];
      $ops[] = [[$this->importer, 'processContentData'], []];
    }






    $ops[] = [[$this->importer, 'cleanUp'], []];


    ksm($ops);

    $batch = [
      'title' => t('Importing Content Types...'),
      // 'operations' => [
      //   [[$this->importer, 'buildContentData'], [$content_file, $import_method]],
      //   [[$this->importer, 'validateContentData'], []],
      //   [[$this->importer, 'processContentData'], []],
      //   [[$this->importer, 'cleanUp'], []]
      // ],
      'operations' => $ops,
      'finished' => [$this->importer, 'importFinished'],
    ];

    batch_set($batch);
  }
}
