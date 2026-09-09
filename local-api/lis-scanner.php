<?php
declare(strict_types=1);

/* Read-only scanner for SBSI LIS Pro result folders. */

const LIS_ROOT = '\\\\172.22.60.5\\SBSI LIS Pro';

const LIS_REPORT_TYPES = [
    'Hematology' => 'Hematology / CBC',
    'Fecalysis' => 'Stool Examination',
    'Urinalysis' => 'Urinalysis',
    'Chemistry' => 'Clinical Chemistry',
    'ImmunoSero' => 'Immunology & Serology',
];

function lisNormalise(string $value): string
{
    return strtoupper(trim(preg_replace('/\\s+/', ' ', $value) ?? ''));
}

function lisFindReports(string $caseNo, string $lastName): array
{
    if (!preg_match('/^[A-Za-z0-9-]{4,30}$/', $caseNo)) {
        return [];
    }
    $reports = [];
    $dayFolders = glob(LIS_ROOT . '\\\\.PDF Results*', GLOB_ONLYDIR) ?: [];
    rsort($dayFolders, SORT_NATURAL);

    foreach ($dayFolders as $dayFolder) {
        foreach (LIS_REPORT_TYPES as $folder => $label) {
            $matches = glob($dayFolder . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $caseNo . '_*.pdf') ?: [];
            foreach ($matches as $path) {
                $fileName = pathinfo($path, PATHINFO_FILENAME);
                $suffix = substr($fileName, strlen($caseNo) + 1);
                $fileLastName = trim((string) strtok($suffix, ','));
                if (!hash_equals(lisNormalise($lastName), lisNormalise($fileLastName))) {
                    continue;
                }
                $reports[$folder] = [
                    'key' => $folder,
                    'test_name' => $label,
                    'released_at' => date('Y-m-d', filemtime($path)),
                    'path' => $path,
                ];
            }
        }
    }
    return array_values($reports);
}
