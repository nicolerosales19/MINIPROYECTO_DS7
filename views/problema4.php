<h2>Problema 4: Suma de números Pares e Impares entre 1 y 200</h2>
<?php
$sumaPares = 0;
$sumaImpares = 0;
$i = 1;

while ($i <= 200) {
    if ($i % 2 === 0) {
        $sumaPares += $i;
    } else {
        $sumaImpares += $i;
    }
    $i++;
}

echo "<div class='resultado'>";
echo "• Suma de números PARES: <strong>$sumaPares</strong><br>";
echo "• Suma de números IMPARES: <strong>$sumaImpares</strong><br>";
echo "</div>";
echo Utilidades::enlaceVolver();
?>