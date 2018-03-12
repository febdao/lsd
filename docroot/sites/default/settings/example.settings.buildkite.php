<?php

/**
 * @file
 * Settings for CI.
 *
 * Use a different database for Buildkite agent.
 */

$settings['trusted_host_patterns'] = [
  '^localhost',
  '^worksafe\.vm',
  '^ci\.worksafe\.vm',
];

$databases['default']['default'] = array (
  'database' => 'buildkite',
  'username' => 'drupal',
  'password' => 'drupal',
  'prefix' => '',
  'host' => '127.0.0.1',
  'port' => '',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
