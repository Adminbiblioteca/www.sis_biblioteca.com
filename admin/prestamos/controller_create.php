<?php

include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

$nombre = $_POST['nombre'];
$carrera = $_POST['carrera'];
$matricula = $_POST['matricula'];
$libro = $_POST['libro'];
$observacion  = $_POST['observacion'];


    $sentencia = $pdo->prepare('INSERT INTO tb_prestamos
(nombre,carrera,matricula,libro,observacion, fyh_creacion, estado)
VALUES ( :nombre,:carrera,:matricula,:libro,:observacion,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombre',$nombre);
    $sentencia->bindParam(':carrera',$carrera);
    $sentencia->bindParam(':matricula',$matricula);
    $sentencia->bindParam(':libro',$libro);
    $sentencia->bindParam(':observacion',$observacion);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estado_del_registro);

    if($sentencia->execute()){
        //echo 'success';
    header('Location:' .$URL.'/admin/prestamos/');
    session_start();
    $_SESSION['msj'] = "Se registro el prestamo de la manera correcta";
    }else{
        session_start();
        $_SESSION['msj'] = "Erro al introducir la información a la base de datos.";
    }





