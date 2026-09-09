<?php
declare(strict_types=1);

/* Save outside public_html as /home/svghph/app-config/online-results.php */
return [
    'api_url' => 'https://pdf-api.svgh.ph/local-api/lis-result-api.php',
    'cloudflare_access_client_id' => 'REPLACE_WITH_SERVICE_TOKEN_CLIENT_ID',
    'cloudflare_access_client_secret' => 'REPLACE_WITH_SERVICE_TOKEN_CLIENT_SECRET',
    'portal_shared_key' => 'THE_SAME_LONG_SECRET_USED_ON_THE_XAMPP_PC',
];
