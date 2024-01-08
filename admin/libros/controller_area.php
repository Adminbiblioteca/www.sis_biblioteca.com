<?php

include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

$area = $_POST['area'];

if($password == $verificar_password){

    $sentencia = $pdo->prepare('INSERT INTO tb_areas
(area,fyh_creacion, estado)
VALUES ( :area,:fyh_creacion,:estado)');

    $sentencia->bindParam(':area',$area);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_del_registro);

    if($sentencia->execute()){
        //echo 'success';
    header('Location:' .$URL.'/admin/libros/create.php');
    session_start();
    $_SESSION['msj'] = "Se registro el area de manera correcta";
    }else{
        session_start();
        $_SESSION['msj'] = "Error al introducir la información a la base de datos.";
    }

}










