# 📑 MINI PROYECTO #2: RESOLVIENDO PROBLEMAS CON ESTRUCTURAS DE DECISIÓN Y REPETICIÓN EN PHP

Este repositorio contiene el código fuente y la arquitectura de software desarrollada para la resolución del Mini Proyecto de la asignatura **Desarrollo de Software VII**. La aplicación ha sido estructurada bajo un patrón de diseño desacoplado (Modelo-Vista-Controlador de un solo punto de entrada) implementando directrices modernas de desarrollo seguro.

---

## Información Institucional y del Grupo
* **Institución:** Universidad Tecnológica de Panamá (UTP)
* **Facultad:** Facultad de Ingeniería de Sistemas Computacionales (FISC)
* **Carrera:** Licenciatura en Desarrollo y Gestión del Software
* **Curso:** Desarrollo de Software VII
* **Grupo:** 1GS131
* **Instructora:** Ing. Irina Fong
* **Fecha de Realización:** Junio de 2026

### Integrantes del Grupo:
* Eduardo González
* Nicole Rosales

---

## Introducción
El propósito de este proyecto es la resolución de 9 problemas algorítmicos complejos planteados en la guía de laboratorio mediante el uso estructurado de flujos de control selectivos (`if`, `else`, `switch`) e iteradores determinados e indeterminados (`for`, `while`, `foreach`) en PHP. 

Para garantizar un estándar profesional, se ha rechazado la mezcla desordenada de código (código espagueti), optando por una arquitectura modular. La aplicación centraliza su flujo en un Controlador Frontal (`index.php`) y delega la lógica de soporte, seguridad y operaciones complejas a un componente de servicios comunes orientado a objetos, promoviendo la reutilización de código (Principio DRY) y la mantenibilidad del sistema.

---

## 🛠️ Tecnologías Utilizadas
* **Backend:** PHP 8.3.28 (Programación Orientada a Objetos y Enrutamiento Dinámico)
* **Frontend:** HTML5, CSS3 (Diseño Responsivo mediante maquetación modular) y JavaScript Nativo.
* **Componentes Gráficos:** Librería Chart.js (CDN) para la renderización dinámica de estadísticas presupuestarias.
* **Servidor Local:** Apache (Entorno de ejecución local).
* **Control de Versiones:** Git & GitHub.

---

## Arquitectura de Software e Implementación Técnica

### Programación Orientada a Objetos (POO) y Métodos Estáticos
La aplicación implementa el paradigma de **Programación Orientada a Objetos** a través de la arquitectura de una clase utilitaria centralizada denominada `Utilidades` (ubicada en `core/Utilidades.php`). Esta clase se diseñó bajo el concepto de componentes "sin estado" (*stateless*), exponiendo sus servicios de manera global mediante **métodos estáticos**. Esto permite invocar funciones críticas en cualquier vista sin necesidad de instanciar repetidamente objetos en la memoria del servidor local, optimizando el rendimiento general del sistema.

### Documentación de Funciones Matemáticas
Para resolver los requerimientos estadísticos y las series numéricas de los laboratorios, se encapsularon comportamientos matemáticos avanzados dentro del backend:
* **`sqrt()` (Raíz Cuadrada):** Utilizada mediante la abstracción estática de la clase para obtener la desviación estándar muestral ($n-1$) en el procesamiento estadístico de cadenas numéricas (Problema 1) y en el análisis del rendimiento de notas académicas (Problema 7).
* **`pow()` (Potenciación):** Aplicada para determinar la dispersión de las muestras estadísticas elevando al cuadrado la diferencia entre cada variable y su media aritmética, además de ser el núcleo computacional para generar de forma iterativa las series exponenciales del Problema 9.

### Funciones de Validación de Datos y Sanitización (Estándares OWASP)
La aplicación adopta políticas estrictas de seguridad web basadas en las recomendaciones del **OWASP Top 10** para mitigar inyecciones en el backend:
* **Validación de Entradas (Input Validation):** Implementada mediante filtros nativos avanzados como `filter_var()` con banderas de validación de enteros (`FILTER_VALIDATE_INT`) y flotantes (`FILTER_VALIDATE_FLOAT`). Esto asegura que el sistema rechace textos corruptos o tipos de datos inválidos antes de procesar ciclos extensos, evitando colapsar el hilo del servidor.
* **Sanitización de Cadenas (Mitigación XSS):** Diseñada para prevenir ataques de *Cross-Site Scripting*. Toda entrada provista por el usuario pasa por un filtro de limpieza que utiliza `htmlspecialchars()` configurado con escape estricto de comillas y codificación UTF-8. Esto neutraliza etiquetas maliciosas como `<script>`, transformándolas en texto plano inofensivo antes de renderizarse en el navegador del cliente.