<?php

include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

$autor = $_POST['autor'];


    $sentencia = $pdo->prepare('INSERT INTO tb_autores
(autor,fyh_creacion, estado)
VALUES ( :autor,:fyh_creacion,:estado)');

    $sentencia->bindParam(':autor',$autor);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_del_registro);

    if($sentencia->execute()){
        //echo 'success';
    header('Location:' .$URL.'/admin/libros/create.php');
    session_start();
    $_SESSION['msj'] = "Se registro el autor|autora de manera correcta";
    }else{
        session_start();
        $_SESSION['msj'] = "Error al introducir la información a la base de datos.";
    }


