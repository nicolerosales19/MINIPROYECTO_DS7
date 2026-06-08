<h2>Problema 9: Cálculo de las Primeras 15 Potencias</h2>
<form method="POST" action="index.php?p=p9">
    <label>Introduzca la Base (Número del 1 al 9):</label><br>
    <input type="number" name="base" min="1" max="9" required>
    <br><input type="submit" value="Calcular Potencias">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $base = Utilidades::validarEnteroPositivo($_POST['base']);
    
    if ($base !== false && $base >= 1 && $base <= 9) {
        echo "<div class='resultado'>";
        echo "<h3>Primeras 15 Potencias del Número $base:</h3>";
        
        for ($exponente = 1; $exponente <= 15; $exponente++) {
            $resultadoPotencia = pow($base, $exponente);
            echo "• $base <sup>$exponente</sup> = " . number_format($resultadoPotencia, 0, '.', ',') . "<br>";
        }
        echo "</div>";
    } else {
        echo "<div class='error'>Por favor, ingrese un número entero válido en el rango de 1 a 9.</div>";
    }
}
echo Utilidades::enlaceVolver();
?>