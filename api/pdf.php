<?php

// PDF folder
$pdfFolder = 'D:/xampp/htdocs/svgh-online-result/pdf/';

// Get requested filename
$file = $_GET['file'] ?? '';

if ($file === '') {
    http_response_code(400);
    exit('No PDF file specified.');
}

// Prevent directory traversal
$file = basename($file);

// Full path
$filePath = $pdfFolder . $file;

// Check if file exists
if (!file_exists($filePath)) {
    http_response_code(404);
    exit('PDF not found.');
}

// Check extension
if (strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) !== 'pdf') {
    http_response_code(403);
    exit('Only PDF files are allowed.');
}

// Tell browser this is a PDF
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
header('Content-Length: ' . filesize($filePath));

// Output PDF
readfile($filePath);
exit;
?>
