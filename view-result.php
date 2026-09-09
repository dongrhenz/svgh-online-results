<?php
declare(strict_types=1);
session_start();
require __DIR__ . '/portal-lis-api.php';
$patient = $_SESSION['online_results_patient'] ?? null;
$results = $_SESSION['online_results_list'] ?? [];
$id = (string) ($_GET['id'] ?? '');
$allowed = false;
foreach ($results as $result) { if (is_array($result) && isset($result['result_id']) && hash_equals((string) $result['result_id'], $id)) { $allowed = true; break; } }
if (!is_array($patient) || !$allowed) { http_response_code(403); exit('This result is not available in your current session.'); }
try {
    $pdf = lisPortalRequest(['action' => 'download', 'case_no' => $patient['case_no'], 'last_name' => $patient['last_name'], 'result_id' => $id]);
    header('Content-Type: application/pdf'); header('Content-Disposition: inline; filename="laboratory-result.pdf"'); header('Cache-Control: no-store, private'); echo $pdf;
} catch (Throwable $exception) { http_response_code(502); exit('Unable to retrieve the result at this time.'); }
