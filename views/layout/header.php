<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Mini Proyecto #2 - FISC</title>
    <style>
        /* Variables de color para mantener consistencia visual (Principio DRY) */
        :root {
            --primary-color: #004474;
            --primary-hover: #002d50;
            --accent-color: #008cc1;
            --bg-color: #f0f4f8;
            --card-bg: #ffffff;
            --text-main: #2d3748;
            --text-muted: #718096;
            --success: #38a169;
            --error: #e53e3e;
            --error-bg: #fff5f5;
            --border-color: #e2e8f0;
        }

        /* Estilos Generales y Reseteo */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.6;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Contenedor Principal (Tarjeta Elevada) */
        .container {
            max-width: 850px;
            width: 100%;
            background: var(--card-bg);
            margin: 0 auto;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 68, 116, 0.05), 0 5px 10px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--border-color);
            flex: 1;
        }

        /* Encabezados */
        h1 {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 15px;
        }

        h2 {
            color: var(--primary-color);
            font-size: 1.4rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        p {
            margin-bottom: 20px;
            color: var(--text-muted);
        }

        /* Menú de Opciones (Lista de problemas en el Index) */
        ul {
            list-style: none;
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-top: 20px;
        }

        ul li a {
            display: block;
            padding: 14px 20px;
            background: #f8fafc;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 8px;
            border-left: 4px solid var(--accent-color);
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        ul li a:hover {
            background: #f1f5f9;
            transform: translateX(5px);
            color: var(--primary-hover);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        }

        /* Formularios y Campos de Entrada */
        form {
            background: #f8fafc;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-main);
        }

        input[type="text"], 
        input[type="number"], 
        input[type="date"], 
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 1rem;
            color: var(--text-main);
            background-color: #fff;
            transition: border-color 0.2s;
            margin-bottom: 15px;
        }

        input[type="text"]:focus, 
        input[type="number"]:focus, 
        input[type="date"]:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(0, 140, 193, 0.15);
        }

        /* Botones */
        input[type="submit"] {
            display: inline-block;
            background-color: var(--success);
            color: white;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
            width: auto;
        }

        input[type="submit"]:hover {
            background-color: #2f855a;
        }

        .btn-volver {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #edf2f7;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s;
            border: 1px solid #cbd5e1;
        }

        .btn-volver:hover {
            background-color: #e2e8f0;
            color: var(--primary-hover);
        }

        /* Cajas de Mensajes y Resultados */
        .resultado {
            background-color: #f0fff4;
            border-left: 4px solid var(--success);
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
            color: #22543d;
        }

        .resultado h3 {
            margin-bottom: 10px;
            color: #234e52;
        }

        .error {
            background-color: var(--error-bg);
            border-left: 4px solid var(--error);
            color: #9b2c2c;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container">