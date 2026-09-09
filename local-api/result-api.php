<?php
declare(strict_types=1);

/*
 * This runs on the XAMPP PC. Protect this route with Cloudflare Access.
 * The API accepts only POST requests made by the hosted portal.
 */

header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store, private');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

$action = (string) ($_POST['action'] ?? '');
$records = require __DIR__ . '/results.php'; // Create from results.example.php.

function normalise(string $value): string
{
    return strtoupper(trim(preg_replace('/\s+/', ' ', $value) ?? ''));
}

function jsonResponse(array $payload, int $status = 200): never
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_SLASHES);
    exit;
}

if ($action === 'lookup') {
    $caseNo = normalise((string) ($_POST['case_no'] ?? ''));
    $lastName = normalise((string) ($_POST['last_name'] ?? ''));

    foreach ($records as $record) {
        if (normalise($record['case_no']) !== $caseNo || normalise($record['last_name']) !== $lastName) {
            continue;
        }

        $results = array_values(array_map(
            static fn(array $result): array => [
                'result_id' => $result['result_id'],
                'test_name' => $result['test_name'],
                'released_at' => $result['released_at'],
            ],
            array_filter($record['results'], static fn(array $result): bool => $record['released'] && !empty($result['file_path']))
        ));

        jsonResponse([
            'found' => true,
            'patient_name' => $record['patient_name'],
            'case_no' => $record['case_no'],
            'results' => $results,
        ]);
    }

    jsonResponse(['found' => false]);
}

if ($action === 'download') {
    $resultId = (string) ($_POST['result_id'] ?? '');
    foreach ($records as $record) {
        foreach ($record['results'] as $result) {
            if (!hash_equals((string) $result['result_id'], $resultId) || empty($record['released'])) {
                continue;
            }
            $path = (string) $result['file_path'];
            if (!is_file($path) || strtolower(pathinfo($path, PATHINFO_EXTENSION)) !== 'pdf') {
                http_response_code(404);
                exit('Result file unavailable');
            }
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="laboratory-result.pdf"');
            header('Content-Length: ' . (string) filesize($path));
            readfile($path);
            exit;
        }
    }
    http_response_code(404);
    exit('Result not found');
}

jsonResponse(['error' => 'Unknown action'], 400);
