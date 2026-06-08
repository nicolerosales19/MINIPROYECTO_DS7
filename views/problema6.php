<h2>Problema 6: Distribución del Presupuesto Anual del Hospital</h2>
<form method="POST" action="index.php?p=p6">
    <label>Monto Presupuestario Total ($):</label><br>
    <input type="number" step="0.01" name="presupuesto_total" required placeholder="Ej: 150000.00">
    <br><input type="submit" value="Calcular Distribución">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $total = Utilidades::validarNumero($_POST['presupuesto_total']);
    
    if ($total !== false && $total > 0) {
        $ginecologia = $total * 0.40;
        $traumatologia = $total * 0.35;
        $pediatria = $total * 0.25;

        echo "<div class='resultado'>";
        // Mostramos el monto total ingresado por el usuario
        echo "<p><strong>El monto presupuestario ingresado es:</strong> $" . number_format($total, 2) . "</p>";
        echo "<hr>";
        
        // Estructura en dos columnas: Izquierda texto, Derecha Gráfica
        echo "<div style='display: flex; flex-wrap: wrap; gap: 20px; align-items: center;'>";
            
            // Columna de datos
            echo "<div style='flex: 1; min-width: 250px;'>";
                echo "<h3>Distribución Oficial del Presupuesto:</h3>";
                echo "🏥 <strong>Ginecología (40%):</strong> $" . number_format($ginecologia, 2) . "<br><br>";
                echo "🩹 <strong>Traumatología (35%):</strong> $" . number_format($traumatologia, 2) . "<br><br>";
                echo "🧸 <strong>Pediatría (25%):</strong> $" . number_format($pediatria, 2) . "<br>";
            echo "</div>";
            
            // Columna del lienzo de la gráfica (Canvas)
            echo "<div style='flex: 1; min-width: 250px; max-width: 320px; margin: 0 auto;'>";
                echo "<canvas id='chartPresupuesto'></canvas>";
            echo "</div>";
            
        echo "</div>"; // Fin del flex layout
        echo "</div>"; // Fin de resultado
?>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <script>
            const ctx = document.getElementById('chartPresupuesto').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Ginecología (40%)', 'Traumatología (35%)', 'Pediatría (25%)'],
                    datasets: [{
                        data: [<?php echo $ginecologia; ?>, <?php echo $traumatologia; ?>, <?php echo $pediatria; ?>],
                        backgroundColor: [
                            '#fd7fca', // Azul para Ginecología
                            '#8ec2f7', // Verde para Traumatología
                            '#b8f799'  // Cian para Pediatría
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom' // Coloca las etiquetas abajo para que no estorben
                        }
                    }
                }
            });
        </script>
<?php
    } else {
        echo "<div class='error'>Monto inválido. Por favor ingrese un presupuesto numérico positivo.</div>";
    }
}
echo Utilidades::enlaceVolver();
?>