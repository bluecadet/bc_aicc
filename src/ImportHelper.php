<?php

namespace Drupal\bc_aicc;

/**
 *
 */
class ImportHelper {

  /**
   *
   */
  public function getBoolValue($str, $default = TRUE) {
    if ($str === 'true' || $str === 'TRUE' || $str === '1') {
      return TRUE;
    }

    if ($str === 'false' || $str === 'FALSE' || $str === '0') {
      return FALSE;
    }

    return $default;
  }

  /**
   *
   */
  public function explodeSettingsField($val) {
    $data = [];
    $d1 = explode(";", $val);

    foreach ($d1 as $d) {
      if (!empty($d)) {
        $d2 = explode(":", $d);
        if (!empty($d2)) {
          $data[$d2[0]] = is_numeric($d2[1]) ? ($d2[1] + 0) : $d2[1];
        }
      }
    }

    return $data;
  }

  /**
   *
   */
  public function splitTermsValue($val) {
    return $this->explodePipe($val);
  }

  /**
   *
   */
  public function splitEntityReferenceValue($val) {
    return $this->explodePipe($val);
  }

  /**
   *
   */
  protected function explodePipe($val) {
    if (empty($val)) {
      return [];
    }
    return explode("|", $val);
  }

  /**
   *
   */
  public function getDepthValue(array $array, array $keys) {
    $current = &$array;
    foreach ($keys as $key) {
      $current = &$current[$key];
    }
    return $current;
  }

  /**
   *
   */
  public function setDepthValue(array &$array, array $keys, $value) {
    $current = &$array;
    foreach ($keys as $key) {
      $current = &$current[$key];
    }

    $current = $value;
  }

  /**
   *
   */
  public function addDepthValue(array &$array, array $keys, $value) {
    $current = &$array;
    foreach ($keys as $key) {
      $current = &$current[$key];
    }

    $current[] = $value;
  }

}
