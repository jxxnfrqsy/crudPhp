<?php

function subir_imagen(){

    if (isset($_FILES["magen_usuario"])) {
        
           $extension= explode('.', $_FILES["magen_usuario"]['name']);
           $nuevo_nombre = rand () . '.' . $extension[1];
           $ubicacion ='./img' . $nuevo_nombre;
           move_uploaded_file($_FILES["magen_usuario"]['tmp_name'], $ubicacion);
           return $nuevo_nombre;

    }
}

function obtener_nombre_imagen($id_usuario) {
    include('conexion.php');
    $stmt= $conexion->prepare("SELECT imagen FROM usuarios WHERE id ='$id_usuario'");
    $stmt->execute();
    $resultado=$stmt->fetchAll();
    foreach($resultado) as $fila {
      
        return $fila["imagen"];


    }

}

function obtener_registros() {
    include('conexion.php');
    $stmt= $conexion->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $resultado=$stmt->fetchAll();
    return $stmt->rowCount();
}