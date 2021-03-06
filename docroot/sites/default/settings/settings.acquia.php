<?php

/**
 * @file
 * Acquia cloud logic, derived from BLT.
 */

/**
 * Host detection.
 */
if (!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
  $forwarded_host = $_SERVER['HTTP_X_FORWARDED_HOST'];
}
elseif(!empty($_SERVER['HTTP_HOST'])) {
  $forwarded_host = $_SERVER['HTTP_HOST'];
}
else {
  $forwarded_host = NULL;
}

$server_protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$forwarded_protocol = !empty($_ENV['HTTP_X_FORWARDED_PROTO']) ? $_ENV['HTTP_X_FORWARDED_PROTO'] : $server_protocol;

/**
 * Environment detection.
 *
 * Note that the values of enviromental variables are set differently on Acquia
 * Cloud Free tier vs Acquia Cloud Professional and Enterprise.
 */
$ah_env = isset($_ENV['AH_SITE_ENVIRONMENT']) ? $_ENV['AH_SITE_ENVIRONMENT'] : NULL;
$ah_group = isset($_ENV['AH_SITE_GROUP']) ? $_ENV['AH_SITE_GROUP'] : NULL;
$is_ah_env = (bool) $ah_env;
$is_ah_prod_env = ($ah_env == 'prod' || $ah_env == '01live');
$is_ah_stage_env = ($ah_env == 'test' || $ah_env == '01test' || $ah_env == 'stg');
$is_ah_dev_cloud = (!empty($_SERVER['HTTP_HOST']) && strstr($_SERVER['HTTP_HOST'], 'devcloud'));
$is_ah_dev_env = (preg_match('/^dev[0-9]*$/', $ah_env) || $ah_env == '01dev');
$is_ah_ode_env = (preg_match('/^ode[0-9]*$/', $ah_env));
$acsf_db_name = $is_acsf ? $GLOBALS['gardens_site_settings']['conf']['acsf_db_name'] : NULL;
$is_local_env = !$is_ah_env;

/**
 * Site directory detection.
 */
try {
  $site_path = \Drupal\Core\DrupalKernel::findSitePath(\Symfony\Component\HttpFoundation\Request::createFromGlobals());
}
catch (\Symfony\Component\HttpKernel\Exception\BadRequestHttpException $e) {
  $site_path = 'sites/default';
}
$site_dir = str_replace('sites/', '', $site_path);

/**
 * Cloud environment settings.
 */
if ($is_ah_env) {
  if (!$is_acsf && file_exists('/var/www/site-php') && $site_dir == 'default') {
    require "/var/www/site-php/$ah_group/$ah_group-settings.inc";
  }

  // Store API Keys and things outside of version control.
  // @see settings/sample-secrets.settings.php for sample code.
  $secrets_file = sprintf('/mnt/gfs/%s.%s/secrets.settings.php', $ah_group, $ah_env);
  if (file_exists($secrets_file)) {
    require $secrets_file;
  }

  // Private files.
  $settings['file_private_path'] = '/mnt/files/[site].[env]/sites/default/files-private';
}

