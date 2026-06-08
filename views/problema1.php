<h2>Problema 1: Estadísticos de 5 Números Reales Positivos</h2>
<form method="POST" action="index.php?p=p1">
    <label>Ingrese 5 números positivos separados por comas (ejemplo: 12, 8, 25, 19, 14):</label><br>
    <input type="text" name="numeros_input" required placeholder="Ej: 10, 20.5, 30, 40, 50">
    <br><input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entrada = isset($_POST['numeros_input']) ? $_POST['numeros_input'] : '';
    $partes = explode(',', $entrada);
    $numeros = [];
    
    foreach ($partes as $p) {
        $val = Utilidades::validarNumero($p);
        if ($val !== false) {
            $numeros[] = $val;
        }
    }

    if (count($numeros) === 5) {
        $min = min($numeros);
        $max = max($numeros);
        $media = array_sum($numeros) / 5;
        
        $sumaVarianza = 0;
        foreach ($numeros as $x) {
            $sumaVarianza += pow($x - $media, 2);
        }
        $desviacion = Utilidades::calcularRaiz($sumaVarianza / 4);
        
        // Muestra la lista de lo que ingresó y los resultados matemáticos
        echo "<div class='resultado'>";
        echo "<p><strong>Números ingresados:</strong> " . implode(', ', $numeros) . "</p>";
        echo "<hr>";
        echo "• Valor Mínimo Detectado: <strong>$min</strong><br>";
        echo "• Valor Máximo Detectado: <strong>$max</strong><br>";
        echo "• Media Aritmética de Muestra: <strong>$media</strong><br>";
        echo "• Desviación Estándar: <strong>" . round($desviacion, 4) . "</strong>";
        echo "</div>";
    } else {
        echo "<div class='error'>Error: Por favor, asegúrese de ingresar exactamente 5 números positivos válidos separados por comas.</div>";
    }
}
echo Utilidades::enlaceVolver();
?>