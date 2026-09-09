<?php
declare(strict_types=1);
session_start();
$patient = $_SESSION['online_results_patient'] ?? null;
$results = $_SESSION['online_results_list'] ?? [];
if (!is_array($patient) || !is_array($results)) { header('Location: index.php', true, 302); exit; }
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>My Results | SVGH</title><link rel="stylesheet" href="css/index.css"></head>
<body><header class="header"><div class="logo"><img src="image/logo.png" alt="SVGH Hospital Logo" class="hospital-logo"></div></header>
<main class="main"><section class="left"><h1 class="title">Your released results</h1><div class="red-line"></div><p class="subtitle">Case No. <?= htmlspecialchars((string) $patient['case_no']) ?></p>
<?php if ($results === []): ?><div class="form">No released results are available yet. Please check again later.</div>
<?php else: ?><div class="result-list"><?php foreach ($results as $result): ?><article class="result-item"><div><strong><?= htmlspecialchars((string) $result['test_name']) ?></strong><span>Released <?= htmlspecialchars((string) $result['released_at']) ?></span></div><a class="submit result-link" href="view-result.php?id=<?= rawurlencode((string) $result['result_id']) ?>">View result</a></article><?php endforeach; ?></div><?php endif; ?>
<p><a href="index.php">Search another patient</a></p></section></main></body></html>
