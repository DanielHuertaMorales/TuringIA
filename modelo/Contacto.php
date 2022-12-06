<?php

class Contacto implements JsonSerializable{
    private string $nombre;
    private string $correo;
    private int $telefono;
    private string $mensaje;

    function __construct(string $nombre = "", string $correo = "", int $telefono, string $mensaje = ""){
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
        return $this;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
        return $this;
    }

    public function setMensaje($mensaje){
        $this->mensaje = $mensaje;
        return $this;
    }

    public function JsonSerialize(){
        return get_object_vars($this);
    }

    function __toString()
    {
        $return_str .=  "Nombre: " . $this->nombre . "<br>";
        $return_str .=  "correo: " . $this->correo . "<br>";
        $return_str .=  "telefono: " . $this->telefono . "<br>";
        $return_str .=  "mensaje: " . $this->mensaje . "<br>";
        return $return_str;
    }


}