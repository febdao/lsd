<?php
/**
 * @file
 * Platform.sh settings.
 */

if (isset($_ENV['PLATFORM_APP_DIR'])) {
  $relationships = getenv('PLATFORM_RELATIONSHIPS');
  $relationships = json_decode(base64_decode($relationships), true);
  foreach ($relationships['database'] as $endpoint) {
    if (empty($endpoint['query']['is_master'])) {
      continue;
    }
    $databases['default']['default'] = array(
      'driver' => $endpoint['scheme'],
      'database' => $endpoint['path'],
      'username' => $endpoint['username'],
      'password' => $endpoint['password'],
      'host' => "{$endpoint['host']}:{$endpoint['port']}",
      'prefix' => '',
    );
  }

  $settings['trusted_host_patterns'] = [
    '^master-7rqtwti-7urzfbygj4ccg\.eu\.platform\.sh',
  ];

  $settings['api_ai_webhook_developer_token'] = 'd3ce75da068a4c74b64e65d5c111dfe3';

}

