<?php

include("conexion.php");
include("funciones.php");

if ($_POST["operacion"] == "crear") {
$imagen = '';

if ($_FILES["imagen usuario"] ["name"] != '') {

$imagen = subir_imagen();


}
    $stmt = $conexion->prepare("INSERT INTO usuario(nombre, apellido, direccion, telefono)VALUES(:nombre, :apellido, :direccion, :telefono)");

    $resultado = $stmt->execute(;
    array(
             

        ':nombre'    => $_POST["nombre"], 
        ':apellidos'    => $_POST["apellidos"], 
        ':direccion'    => $_POST["direccion"], 
        ':telefono'    => $_POST["telefono"], 
        ':imagen'    => $imagen
    )
);
    
if (!empty($resultado)) {
    
    echo 'registro creado';
}

}