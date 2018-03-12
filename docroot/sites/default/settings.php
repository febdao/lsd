<?php

/**
 * @file
 * Settings entry point.
 *
 * Don't change this file. Should be the same for all multi-sites.
 */

$databases = [];
$config_directories = [];

// Settings for the current site.
include $app_root . '/' . $site_path . '/settings/settings.default.php';

// Load a local settings file, if it exists.
if (file_exists($app_root . '/' . $site_path . '/settings/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings/settings.local.php';
}
$settings['install_profile'] = 'minimal';
