<?php
declare(strict_types=1);

/*
 * Sample only.  A scheduled LIS import should write the same fields to MySQL
 * or generate this registry. Store real PDFs outside Apache's document root.
 */
return [
    [
        'case_no' => '2026-000001',
        'last_name' => 'DELA CRUZ',
        'patient_name' => 'JUAN DELA CRUZ',
        'released' => true,
        'results' => [
            [
                'result_id' => 'a5af1d50-cbc-demo',
                'test_name' => 'Complete Blood Count (CBC)',
                'released_at' => '2026-09-08',
                'file_path' => 'D:\\LIS-Results\\2026\\2026-000001-cbc.pdf',
            ],
            [
                'result_id' => 'dc51de21-urinalysis-demo',
                'test_name' => 'Urinalysis',
                'released_at' => '2026-09-08',
                'file_path' => 'D:\\LIS-Results\\2026\\2026-000001-urinalysis.pdf',
            ],
        ],
    ],
];
