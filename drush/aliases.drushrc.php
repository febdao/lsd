<?php

/**
 * Drupal VM drush aliases.
 *
 * @see example.aliases.drushrc.php.
 */

$aliases['vm'] = array(
  'uri' => 'dfat-innovation.vm',
  'root' => '/var/www/drupalvm/docroot',
  'remote-host' => 'dfat-innovation.vm',
  'remote-user' => 'vagrant',
  'ssh-options' => '-o "SendEnv PHP_IDE_CONFIG PHP_OPTIONS XDEBUG_CONFIG" -o PasswordAuthentication=no -i "' . (getenv('VAGRANT_HOME') ?: drush_server_home() . '/.vagrant.d') . '/insecure_private_key"',
  'path-aliases' => array(
    '%drush-script' => '/var/www/drupalvm/vendor/bin/drush',
  ),
);

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}
