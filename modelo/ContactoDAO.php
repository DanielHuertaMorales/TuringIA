<?php


class ContactoDAO{
    public $mysqli;
    private $error;
    function __construct()
    {
        $host = 'localhost:3308';
        $username = 'root';
        $password = '';
        $database = 'turing-ia';


        // Create connection

        $this->mysqli = new mysqli($host, $username, $password, $database);

        if ($this->mysqli->connect_errno) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function getError()
    {
        return $this->error;
    }

    function createContacto(Contacto $contacto){
        try {
            //code...
            $stmt = $this->mysqli->prepare("INSERT INTO contacto( nombre, correo, telefono, mensaje) values (?, ?, ?, ?);");
            $nombre = $contacto->getNombre();
            $correo = $contacto->getCorreo();
            $telefono = $contacto->getTelefono();
            $mensaje = $contacto->getMensaje();
            $stmt->bind_param("ssss", $nombre, $correo, $telefono, $mensaje);
            $result = $stmt->execute();

            return $result;
        } catch (\Throwable $th) {
            //throw $th;
            $this->error = ["mensaje" => $th->getMessage(), "code" => $th->getCode()];
            return null;
        }
    }

}