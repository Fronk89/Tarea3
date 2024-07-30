<?php

class DbConexion
{
    private $host = '195.35.39.235';
    private $user = 'u137586184_frank';
    private $password = 'Frankito_22';
    private $dbName = 'u137586184_db_biblioteca';

    public function getConexion()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbName";
            $obPdo = new PDO($dsn, $this->user, $this->password);
            return $obPdo;
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }


    public function GetLibros()
    {
        $pdoConexion = $this->getConexion();
        $resultado = ["Vacio"];
        if(is_object( $pdoConexion ))
        {
            $sql = "SELECT * FROM titulos";
            $resultado = $pdoConexion->query($sql);
        }

        return $resultado;
    }

    public function GetAutores()
    {
        $pdoConexion = $this->getConexion();
        $resultado = ["Vacio"];
        if(is_object( $pdoConexion ))
        {
            $sql = "SELECT * FROM autores";
            $resultado = $pdoConexion->query($sql);
        }

        return $resultado;
    }
    public function Getcomentarios()
    {
        $pdoConexion = $this->getConexion();
        $resultado = ["Vacio"];
        if(is_object( $pdoConexion ))
        {
            $sql = "SELECT * FROM contactos";
            $resultado = $pdoConexion->query($sql);
        }

        return $resultado;
    }

    public function InsertarComentario($correo, $nombre, $asunto, $comentario)
    {
        $pdoConexion = $this->getConexion();
        $fecha = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comentarios (fecha, correo, nombre, asunto, comentario) VALUES (:fecha, :email, :nombre, :asunto, :comentario)";
        $stmt = $pdoConexion->prepare($sql);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':email', $correo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->execute();
    }
}
?>