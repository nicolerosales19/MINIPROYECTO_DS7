<h2>Problema 2: Suma de los números del 1 al 1,000</h2>
<?php
$suma = 0;
for ($i = 1; $i <= 1000; $i++) {
    $suma += $i;
}
echo "<div class='resultado'>La suma total calculada de los números del 1 al 1,000 es: <strong>$suma</strong></div>";
echo Utilidades::enlaceVolver();
?>