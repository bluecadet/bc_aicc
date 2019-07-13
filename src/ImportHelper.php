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
    $placeholders = [];
    $altered_val = $this->processPlaceholders($placeholders, $val);

    return $this->processExplosions($altered_val, $placeholders);
  }

  /**
   *
   */
  protected function processPlaceholders(&$placeholders, $string) {
    preg_match_all('/(\[[^\[\]]*\])/', $string, $matches);

    if (!empty($matches[0])) {
      $p_key = "#PLACEHOLDER" . (count($placeholders) + 1);
      $placeholders[$p_key] = $matches[0][0];

      $string = str_replace($matches[0][0], $p_key, $string);
      $string = $this->processPlaceholders($placeholders, $string);
    }

    return $string;
  }

  /**
   *
   */
  protected function processExplosions($val, $placeholders) {
    $data = [];
    $d1 = explode(";", $val);

    // ksm($d1);

    foreach ($d1 as $d) {
      if (!empty($d)) {
        $d2 = explode(":", $d);
        if (!empty($d2)) {

          if (count($d2) == 1) {
            $data[] = is_numeric($d2[0]) ? ($d2[0] + 0) : $d2[0];
          }
          elseif (isset($placeholders[$d2[1]])) {
            $data[$d2[0]] = $this->processExplosions(substr($placeholders[$d2[1]], 1, -1), $placeholders);
          }
          else {

            if (count($d2) > 1) {
              $d2[1] = implode(":", array_slice($d2, 1));
            }

            $data[$d2[0]] = is_numeric($d2[1]) ? ($d2[1] + 0) : $d2[1];
          }
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
  public function splitAllowedValues($val) {
    $data = [];
    $d1 = explode(",", $val);

    foreach ($d1 as $d) {
      if (!empty($d)) {
        $d2 = explode("|", $d);
        if (!empty($d2)) {
          $data[$d2[0]] = $d2[1];
        }
      }
    }

    return $data;
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
