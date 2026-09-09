<?php
declare(strict_types=1);

/*
 * Copy this file to a non-public directory, for example:
 * /home/svghph/app-config/online-results.php
 * Then update patient-home.php and view-result.php to require that copy.
 */
return [
    'api_base_url' => 'https://pdf-api.svgh.ph/local-api/result-api.php',
    'cloudflare_access_client_id' => 'REPLACE_WITH_CLOUDFLARE_ACCESS_CLIENT_ID',
    'cloudflare_access_client_secret' => 'REPLACE_WITH_CLOUDFLARE_ACCESS_CLIENT_SECRET',
    'request_timeout_seconds' => 15,
];
