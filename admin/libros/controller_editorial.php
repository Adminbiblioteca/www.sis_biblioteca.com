<?php

include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

$editorial = $_POST['editorial'];


    $sentencia = $pdo->prepare('INSERT INTO tb_editorial
(editorial,fyh_creacion, estado)
VALUES ( :editorial,:fyh_creacion,:estado)');

    $sentencia->bindParam(':editorial',$editorial);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_del_registro);

    if($sentencia->execute()){
        //echo 'success';
    header('Location:' .$URL.'/admin/libros/create.php');
    session_start();
    $_SESSION['msj'] = "Se registro la editorial de manera correcta";
    }else{
        session_start();
        $_SESSION['msj'] = "Error al introducir la información a la base de datos.";
    }


