<?php
require_once 'core/Utilidades.php';

// Capturar la opción de forma segura (OWASP)
$page = isset($_GET['p']) ? Utilidades::sanitizar($_GET['p']) : 'menu';

include 'views/layout/header.php';

// Selección estructurada del problema
switch ($page) {
    case 'menu':
        include 'views/menu.php';
        break;
    case 'p1':
        include 'views/problema1.php';
        break;
    case 'p2':
        include 'views/problema2.php';
        break;
    case 'p3':
        include 'views/problema3.php';
        break;
    case 'p4':
        include 'views/problema4.php';
        break;
    case 'p5':
        include 'views/problema5.php';
        break;
    case 'p6':
        include 'views/problema6.php';
        break;
    case 'p7':
        include 'views/problema7.php';
        break;
    case 'p8':
        include 'views/problema8.php';
        break;
    case 'p9':
        include 'views/problema9.php';
        break;
    default:
        // OWASP: Manejo seguro de errores sin exponer rutas internas del servidor
        echo "<div class='error'>Opción no válida. Volviendo al inicio de forma segura.</div>";
        echo Utilidades::enlaceVolver();
        break;
}

include 'views/layout/footer.php';