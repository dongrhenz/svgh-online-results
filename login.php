<?php
declare(strict_types=1);
session_start();
require __DIR__ . '/portal-lis-api.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php', true, 302); exit; }
$caseNo = trim((string) ($_POST['admission_number'] ?? ''));
$lastName = trim((string) ($_POST['last_name'] ?? ''));
if ($caseNo === '' || $lastName === '') { http_response_code(422); exit('Case number and last name are required.'); }

try {
    $response = lisPortalRequest(['action' => 'lookup', 'case_no' => $caseNo, 'last_name' => $lastName]);
    $data = json_decode((string) $response, true);
    if (!is_array($data) || empty($data['found'])) { http_response_code(404); exit('No released results were found for those details.'); }
    $_SESSION['online_results_patient'] = ['case_no' => $caseNo, 'last_name' => $lastName];
    $_SESSION['online_results_list'] = $data['results'] ?? [];
    header('Location: patient-home.php', true, 303);
    exit;
} catch (Throwable $exception) {
    http_response_code(503);
    exit('The result service is temporarily unavailable.');
}
