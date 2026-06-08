<?php
// Cumpliendo PSR-1: Nombre de clase en StudlyCaps
class Utilidades {

    // OWASP A03:2021-Injection - Sanitización contra ataques XSS
    public static function sanitizar($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    // OWASP: Validación estricta de números enteros positivos
    public static function validarEnteroPositivo($num) {
        if (filter_var($num, FILTER_VALIDATE_INT) !== false && $num > 0) {
            return (int)$num;
        }
        return false;
    }

    // OWASP: Validación de números flotantes (para presupuestos o notas)
    public static function validarNumero($monto) {
        if (filter_var($monto, FILTER_VALIDATE_FLOAT) !== false && $monto >= 0) {
            return (float)$monto;
        }
        return false;
    }

    // Función matemática para cálculo de raíz cuadrada o potencias aisladas
    public static function calcularRaiz($valor) {
        return sqrt($valor);
    }

    // Componente de navegación reutilizable solicitado por el taller
    public static function enlaceVolver() {
        return '<br><a href="index.php" class="btn-volver">← Volver al Menú Principal</a>';
    }
}