<h2>Problema 3: Imprimir los N primeros múltiplos de 4</h2>
<form method="POST" action="index.php?p=p3">
    <label>Cantidad de múltiplos (N):</label><br>
    <input type="number" name="cantidad_n" min="1" required>
    <br><input type="submit" value="Generar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validación estricta usando nuestra clase del Core
    $n = Utilidades::validarEnteroPositivo($_POST['cantidad_n']);
    
    if ($n !== false) {
        echo "<div class='resultado'>";
        echo "<strong>Los primeros $n múltiplos de 4 son:</strong><br><br>";
        
        // CORREGIDO: Se eliminó el '$' antes del número 4
        for ($i = 1; $i <= $n; $i++) {
            $multiplo = 4 * $i; 
            echo "• 4 × $i = <strong>$multiplo</strong><br>";
        }
        
        echo "</div>";
    } else {
        echo "<div class='error'>Por favor, ingrese un número entero positivo válido.</div>";
    }
}
echo Utilidades::enlaceVolver();
?>