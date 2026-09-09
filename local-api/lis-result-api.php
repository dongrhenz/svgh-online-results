<?php
declare(strict_types=1);

require __DIR__ . '/lis-scanner.php';
header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store, private');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }

$configPath = dirname(__DIR__, 3) . '/private/online-results-local.php';
if (!is_file($configPath)) { http_response_code(500); exit('Local API configuration is missing'); }
$config = require $configPath;
$providedKey = (string) ($_SERVER['HTTP_X_PORTAL_KEY'] ?? '');
if ($providedKey === '' || !hash_equals((string) ($config['portal_shared_key'] ?? ''), $providedKey)) { http_response_code(403); exit('Forbidden'); }

function sendLisJson(array $payload, int $status = 200): never {
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_SLASHES);
    exit;
}

$action = (string) ($_POST['action'] ?? '');
$caseNo = trim((string) ($_POST['case_no'] ?? ''));
$lastName = trim((string) ($_POST['last_name'] ?? ''));
$reports = lisFindReports($caseNo, $lastName);

if ($action === 'lookup') {
    sendLisJson([
        'found' => $reports !== [],
        'case_no' => $caseNo,
        'results' => array_map(static fn(array $report): array => [
            'result_id' => $report['key'],
            'test_name' => $report['test_name'],
            'released_at' => $report['released_at'],
        ], $reports),
    ]);
}

if ($action === 'download') {
    $resultId = (string) ($_POST['result_id'] ?? '');
    foreach ($reports as $report) {
        if (!hash_equals($report['key'], $resultId)) { continue; }
        if (!is_file($report['path'])) { http_response_code(404); exit('Result unavailable'); }
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="laboratory-result.pdf"');
        header('Content-Length: ' . (string) filesize($report['path']));
        readfile($report['path']);
        exit;
    }
    http_response_code(404);
    exit('Result not found');
}

sendLisJson(['error' => 'Unknown action'], 400);
