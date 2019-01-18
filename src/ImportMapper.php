<?php

namespace Drupal\bc_aicc;

/**
 *
 */
class ImportMapper {

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
  public function setKeysAndProcessTaxonomyType($row) {
    $keys = [
      'name',
      'vid',
      'description',
      'terms',
    ];

    $new_row = array_combine($keys, array_slice($row, 1, 4));
    $new_row['terms'] = $this->helper->splitTermsValue($new_row['terms']);

    return $new_row;
  }

  /**
   *
   */
  public function setKeysAndProcessParagraphBundle($row) {
    $keys = [
      'label',
      'id',
      'description',
    ];

    $new_row = array_combine($keys, array_slice($row, 1, 3));

    return $new_row;
  }

  /**
   * Map Node Bundles.
   */
  public function setKeysAndProcessNodeBundle($row) {
    $keys = [
      'name',
      'bundle',
      'description',
      'title_label',
      'preview_mode',
      'help',
      'new_revision',
      'display_submitted',
      'status',
      'promote',
      'sticky',
      'available_menus',
      'parent',
      'pathauto',
    ];

    $new_row = array_combine($keys, array_slice($row, 1, 14));

    $new_row['preview_mode'] = $this->helper->getBoolValue($new_row['preview_mode']);
    $new_row['new_revision'] = $this->helper->getBoolValue($new_row['new_revision']);
    $new_row['display_submitted'] = $this->helper->getBoolValue($new_row['display_submitted']);
    $new_row['status'] = $this->helper->getBoolValue($new_row['status']);
    $new_row['promote'] = $this->helper->getBoolValue($new_row['promote']);
    $new_row['sticky'] = $this->helper->getBoolValue($new_row['sticky']);

    return $new_row;
  }

  /**
   * Map Node Field data.
   */
  public function setKeysAndProcessNodeField($row) {
    return $this->setKeysAndProcessField($row, 14, 17);
  }

  /**
   * Map Node Field data.
   */
  public function setKeysAndProcessTaxonomyField($row) {
    return $this->setKeysAndProcessField($row, 5, 17);
  }

  /**
   * Map Node Field data.
   */
  public function setKeysAndProcessParagraphField($row) {
    return $this->setKeysAndProcessField($row, 4, 17);
  }

  /**
   *
   */
  protected function setKeysAndProcessField($row, $offset, $count) {
    $keys = [
      'name',
      'machine_name',
      'field_type',
      'field_storage_settings',
      'cardinality',
      'entity_reference',
      'description',
      'required',
      'field_settings',
      'field_third_party_settings',
      'form_type',
      'form_type_settings',
      'form_third_party_settings',
      'display_label',
      'display_type',
      'display_type_settings',
      'display_type_third_party_settings',
    ];

    $new_row = array_combine($keys, array_slice($row, $offset, $count));

    $new_row['required'] = $this->helper->getBoolValue($new_row['required']);

    $new_row['field_storage_settings'] = $this->helper->explodeSettingsField($new_row['field_storage_settings']);
    $new_row['field_third_party_settings'] = $this->helper->explodeSettingsField($new_row['field_third_party_settings']);
    $new_row['field_settings'] = $this->helper->explodeSettingsField($new_row['field_settings']);
    $new_row['form_type_settings'] = $this->helper->explodeSettingsField($new_row['form_type_settings']);
    $new_row['form_third_party_settings'] = $this->helper->explodeSettingsField($new_row['form_third_party_settings']);
    $new_row['display_type_settings'] = $this->helper->explodeSettingsField($new_row['display_type_settings']);
    $new_row['display_type_third_party_settings'] = $this->helper->explodeSettingsField($new_row['display_type_third_party_settings']);

    if (in_array($new_row['field_type'], ['list_string'])) {
      $new_row['allowed_values'] = $this->helper->splitAllowedValues($new_row['entity_reference']);
      // @TODO: should we delete this?
      // unset($new_row['entity_reference']);
      return $new_row;
    }

    $new_row['entity_reference'] = $this->helper->splitEntityReferenceValue($new_row['entity_reference']);

    return $new_row;
  }

  /**
   *
   */
  public function setKeysAndProcessParagraphFieldGroupWrapper($row) {
    $keys = [
      'label',
      'group_name',
      'format_type',
      'format_settings',
    ];

    $new_row = array_combine($keys, array_slice($row, 4, 4));

    $new_row['format_settings'] = $this->helper->explodeSettingsField($new_row['format_settings']);

    return $new_row;
  }

  /**
   *
   */
  public function setKeysAndProcessParagraphFieldGroup($row) {

    $keys = [
      'label',
      'group_name',
      'format_type',
      'format_settings',
    ];

    $new_row = array_combine($keys, array_slice($row, 4, 4));

    $new_row['format_settings'] = $this->helper->explodeSettingsField($new_row['format_settings']);

    return $new_row;
  }

}
