<h2>Problema 8: Identificador de Estación del Año</h2>
<form method="POST" action="index.php?p=p8">
    <label>Seleccione una Fecha de Evaluación:</label><br>
    <input type="date" name="fecha_usuario" required>
    <br><input type="submit" value="Ver Estación">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fechaRaw = isset($_POST['fecha_usuario']) ? $_POST['fecha_usuario'] : '';
    
    if (!empty($fechaRaw)) {
        $time = strtotime($fechaRaw);
        $mes = (int)date('m', $time);
        $dia = (int)date('d', $time);
        $estacion = "";
        $imagen = "";

        // Lógica de rangos estructurada y asignación de la imagen correspondiente
        if (($mes === 12 && $dia >= 21) || ($mes === 1) || ($mes === 2) || ($mes === 3 && $dia <= 20)) {
            $estacion = "Verano";
            $imagen = "verano.jpg"; // Asegúrate de usar la extensión correcta (.jpg o .png)
        } elseif (($mes === 3 && $dia >= 21) || ($mes === 4) || ($mes === 5) || ($mes === 6 && $dia <= 21)) {
            $estacion = "Otoño";
            $imagen = "otono.jpg";
        } elseif (($mes === 6 && $dia >= 22) || ($mes === 7) || ($mes === 8) || ($mes === 9 && $dia <= 22)) {
            $estacion = "Invierno";
            $imagen = "invierno.jpg";
        } else {
            $estacion = "Primavera";
            $imagen = "primavera.avif";
        }

        echo "<div class='resultado' style='display: flex; flex-direction: column; align-items: center; text-align: center;'>";
        echo "<p style='margin-bottom: 15px;'>Fecha Ingresada: <strong>" . date('d-m-Y', $time) . "</strong></p>";
        echo "<p style='font-size: 1.2rem; margin-bottom: 15px;'>La estación correspondiente es: <strong style='color: var(--primary-color);'>$estacion</strong></p>";
        
        // Renderizado dinámico de la imagen con diseño UI/UX pulido
        echo "<img src='img/$imagen' alt='$estacion' style='max-width: 100%; width: 350px; height: auto; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.15); border: 2px solid #fff; margin-top: 10px;'>";
        echo "</div>";
    }
}
echo Utilidades::enlaceVolver();
?>