<?php
echo "<pre>";
for ($i = 0; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
        // Remplissage selon le motif demandé
        echo "{$i} * 9 = " . ($i * 9) . "\t";
    }
    echo "\n";
}
echo "</pre>";
?>