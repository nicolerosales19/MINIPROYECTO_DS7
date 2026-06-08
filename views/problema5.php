<h2>Problema 5: Clasificación de Edades</h2>
<form method="POST" action="index.php?p=p5">
    <p>Ingrese la edad de 5 personas:</p>
    <?php for($i=1; $i<=5; $i++): ?>
        <input type="number" name="edades[]" min="0" placeholder="Persona <?php echo $i;?>" required style="display:block; margin-bottom:5px;">
    <?php endfor; ?>
    <br><input type="submit" value="Clasificar">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edades'])) {
    $edades = $_POST['edades'];
    $conteoCategorias = ['Niño' => 0, 'Adolescente' => 0, 'Adulto' => 0, 'Adulto Mayor' => 0];
    $datosValidos = true;
    $edadesProcesadas = []; // Arreglo para guardar las edades limpias y válidas

    foreach ($edades as $edad) {
        $e = filter_var($edad, FILTER_VALIDATE_INT);
        if ($e === false || $e < 0) {
            $datosValidos = false;
            break;
        }

        $edadesProcesadas[] = $e; // Guardamos la edad validada

        // Estructura condicional de rango de edad
        if ($e >= 0 && $e <= 12) $conteoCategorias['Niño']++;
        elseif ($e >= 13 && $e <= 17) $conteoCategorias['Adolescente']++;
        elseif ($e >= 18 && $e <= 64) $conteoCategorias['Adulto']++;
        else $conteoCategorias['Adulto Mayor']++;
    }

    if ($datosValidos) {
        echo "<div class='resultado'>";
        // Mostramos las edades que el usuario ingresó
        echo "<p><strong>Edades ingresadas: </strong> [ " . implode(', ', $edadesProcesadas) . " ]</p>";
        echo "<hr>";
        echo "<strong>Resultados de Clasificación:</strong><br>";
        foreach ($conteoCategorias as $cat => $cant) {
            echo "• $cat: <strong>$cant</strong> personas<br>";
        }
        echo "</div>";
    } else {
        echo "<div class='error'>Error en la captura. Ingrese valores enteros válidos.</div>";
    }
}
echo Utilidades::enlaceVolver();
?>