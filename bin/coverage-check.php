<?php

declare(strict_types=1);

[, $file, $minimum] = $argv + [null, 'build/coverage.clover', '100'];

$metrics = (new SimpleXMLElement((string) file_get_contents($file)))->project->metrics;
$statements = (int) $metrics['statements'];
$covered = (int) $metrics['coveredstatements'];
$percent = 0 === $statements ? 100.0 : $covered / $statements * 100;

printf("Line coverage: %.2f%% (minimum %.2f%%)\n", $percent, (float) $minimum);

exit($percent + 1e-9 < (float) $minimum ? 1 : 0);
