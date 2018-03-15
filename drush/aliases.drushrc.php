<?php

/**
 * Drupal VM drush aliases.
 *
 * @see example.aliases.drushrc.php.
 */

$aliases['master'] = array (
  'root' => '/app/docroot',
  'platformsh-cli-auto-remove' => true,
  'uri' => 'https://master-7rqtwti-kax3uftyymou2.au.platformsh.site/',
  'remote-host' => 'ssh.au.platform.sh',
  'remote-user' => 'kax3uftyymou2-master-7rqtwti--drupal',
);

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
