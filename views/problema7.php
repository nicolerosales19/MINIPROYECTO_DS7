<h2>Problema 7: Procesamiento de Arreglos de Notas Académicas</h2>
<form method="POST" action="index.php?p=p7">
    <label>Ingrese una lista de notas separadas por comas (0 a 100):</label><br>
    <input type="text" name="notas_array" required placeholder="Ej: 85, 94, 76, 100, 88">
    <br><input type="submit" value="Analizar Notas">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw = isset($_POST['notas_array']) ? $_POST['notas_array'] : '';
    $partes = explode(',', $raw);
    $notas = [];
    
    // Validamos y filtramos las notas primero
    foreach ($partes as $p) {
        $n = Utilidades::validarNumero($p);
        if ($n !== false && $n <= 100) {
            $notas[] = $n;
        }
    }

    $totalNotas = count($notas);
    if ($totalNotas > 0) {
        // 1. Inicializamos variables para los cálculos con foreach
        $notaMinima = 101; // Más alto que el rango máximo para capturar el primer mínimo
        $notaMaxima = -1;  // Más bajo que el rango mínimo para capturar el primer máximo
        $sumaNotas = 0;

        // 2. Primer ciclo foreach: Cálculo de Máximo, Mínimo y Suma para el promedio
        foreach ($notas as $nota) {
            if ($nota < $notaMinima) {
                $notaMinima = $nota;
            }
            if ($nota > $notaMaxima) {
                $notaMaxima = $nota;
            }
            $sumaNotas += $nota;
        }
        
        $promedio = $sumaNotas / $totalNotas;

        // 3. Segundo ciclo foreach: Cálculo de la varianza para la Desviación Estándar
        $sumaVarianza = 0;
        foreach ($notas as $nota) {
            $sumaVarianza += pow($nota - $promedio, 2);
        }
        
        // Desviación estándar muestral (n - 1). Si es solo una nota, se evita la división por cero.
        $desviacion = ($totalNotas > 1) ? Utilidades::calcularRaiz($sumaVarianza / ($totalNotas - 1)) : 0;
        
        // Muestra la lista limpia de las calificaciones aceptadas y el reporte estadístico completo
        echo "<div class='resultado'>";
        echo "<p><strong>Notas ingresadas: </strong> [ " . implode(', ', $notas) . " ]</p>";
        echo "<hr>";
        echo "• Total de calificaciones evaluadas: <strong>$totalNotas</strong><br>";
        echo "• Nota Mínima Obtenida: <strong>$notaMinima</strong><br>";
        echo "• Nota Máxima Obtenida: <strong>$notaMaxima</strong><br>";
        echo "• Promedio General de Rendimiento: <strong>" . round($promedio, 2) . "</strong><br>";
        echo "• Desviación Estándar Académica (n-1): <strong>" . round($desviacion, 4) . "</strong>";
        echo "</div>";
    } else {
        echo "<div class='error'>Error: Ingrese calificaciones válidas comprendidas entre 0 y 100, estructuradas por comas.</div>";
    }
}
echo Utilidades::enlaceVolver();
?>