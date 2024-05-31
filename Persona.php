<?php

require 'Conexion.php';
class Persona
{
    private $nombre;

    private $apellido;

    private $email;

    private $fechaNac;

    private $numero;

    private $genero;

    private $pais;

    public function __construct($nombre, $apellido, $email, $fechaNac, $numero, $genero, $pais)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->fechaNac = $fechaNac;
        $this->numero = $numero;
        $this->genero = $genero;
        $this->pais = $pais;
    }

    public function insertar(): bool
    {
        try {
            //code...
            $pdo = Conexion::getPDOConnection();
            $sql = "INSERT INTO personas (Nombre, Apellido, Correo, FechaNacimiento, 
Telefono, Genero, Pais) VALUES 
(:nombre, 
:apellido, :correo, :fecha, :tel, :genero, :pais);";

            $stmt = $pdo->prepare($sql);
            // Vincular parámetros
            $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $this->apellido, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':fecha', $this->fechaNac, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $this->numero, PDO::PARAM_STR);
            $stmt->bindParam(':genero', $this->genero, PDO::PARAM_STR);
            $stmt->bindParam(':pais', $this->pais, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (\Throwable $th) {
            //throw $th;
            $men = $th->getMessage();
        }
    }
}
