<?php

require_once 'Persona.php';  // Asegúrate de que la ruta al archivo de la clase es correcta

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $pais = $_POST['pais'] ?? '';

    // Crear instancia de Auto
    $persona = new Persona(
        nombre: $nombre,
        apellido: $apellido,
        email: $correo,
        fechaNac: $fecha,
        numero: $tel,
        genero: $genero,
        pais: $pais
    );

    // Insertar en la base de datos
    if ($persona->insertar()) {
        echo "exito.";
    } else {
        echo "Error al registrar la persona.";
    }
} else {
    echo "Método de solicitud no soportado.";
}
