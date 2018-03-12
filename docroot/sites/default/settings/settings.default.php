<?php

/**
 * @file
 * Settings specific to a site in sites/*
 */

//$is_acquia = (bool) isset($_ENV['AH_SITE_ENVIRONMENT']) ? $_ENV['AH_SITE_ENVIRONMENT'] : NULL;
//
//// Settings for acquia cloud.
//if ($is_acquia) {
//  include $app_root . '/sites/default/settings/settings.acquia.php';
//}

// Settings for platform.sh.
$is_platform = isset($_ENV['PLATFORM_APP_DIR']);
if ($is_platform) {
  include $app_root . '/sites/default/settings/settings.platform.php';
}

$settings['hash_salt'] = 'G2RezNogY0QIilvW4Ysg0X2BjmXtMUsLPxrQxy1bUmoWYKKIArIYqvbsGw852WKQIE-6g4GlNB';
$settings['update_free_access'] = FALSE;

$settings['deployment_identifier'] = \Drupal::VERSION;
$deploy_id_file = $app_root . '/' . $site_path . '/../deployment_identifier';
if (file_exists($deploy_id_file)) {
  $settings['deployment_identifier'] = file_get_contents($deploy_id_file);
}

$settings['container_yamls'][] = $app_root . '/sites/default/settings/services.default.yml';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

// This is for Platform.sh. Change this in settings.local.php for local development if needed.
$settings['file_private_path'] = '../private';

$config_directories['sync'] = '../config/default';
