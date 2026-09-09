<?php
declare(strict_types=1);

function lisPortalConfig(): array
{
    $path = dirname(__DIR__, 2) . '/app-config/online-results.php';
    if (!is_file($path)) { throw new RuntimeException('Portal configuration is missing.'); }
    $config = require $path;
    foreach (['api_url', 'cloudflare_access_client_id', 'cloudflare_access_client_secret', 'portal_shared_key'] as $key) {
        if (empty($config[$key])) { throw new RuntimeException('Portal configuration is incomplete.'); }
    }
    return $config;
}

function lisPortalRequest(array $payload): array|string
{
    if (!function_exists('curl_init')) { throw new RuntimeException('PHP cURL is not enabled.'); }
    $config = lisPortalConfig();
    $curl = curl_init($config['api_url']);
    curl_setopt_array($curl, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_HTTPHEADER => [
            'CF-Access-Client-Id: ' . $config['cloudflare_access_client_id'],
            'CF-Access-Client-Secret: ' . $config['cloudflare_access_client_secret'],
            'X-Portal-Key: ' . $config['portal_shared_key'],
        ],
    ]);
    $body = curl_exec($curl);
    $status = (int) curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
    curl_close($curl);
    if ($body === false || $status < 200 || $status >= 300) { throw new RuntimeException('The laboratory result service is unavailable.'); }
    return $body;
}
