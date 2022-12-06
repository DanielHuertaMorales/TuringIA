<?php
/*creacion del modelo para ser utilizado en la funcion createContacto*/ 

include "../modelo/Contacto.php";
include "../modelo/ContactoDAO.php";

session_start();
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$nombre = $data["nombre"];
$correo = $data["correo"];
$telefono = $data["telefono"];
$mensaje = $data["mensaje"];

$contacto = new Contacto($nombre, $correo, $telefono, $mensaje);

$dao = new ContactoDAO();

$result = $dao->createContacto($contacto);
if($result == null) {
    http_response_code(500);
    $response = json_encode([
        "mensaje" => $dao->getError()["mensaje"],
        "code" => $dao->getError()["code"]
    ]);
    echo $response;
    die;
}
$response = json_encode($contacto);

echo $response;
?>