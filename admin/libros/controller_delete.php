<?php


include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

 $id_libro = $_POST['id_libro'];
 $estado_inactivo = '0';

$sentencia = $pdo->prepare("UPDATE tb_libros SET estado = '$estado_inactivo',fyh_eliminacion='$fechaHora' WHERE id_libro = :id_libro");

$sentencia->bindParam(':id_libro',$id_libro);

if($sentencia->execute()){
    header('Location:' .$URL.'/admin/libros/');
    session_start();
    $_SESSION['msj'] = "Se elimino el libro de la manera correcta";
}else{
    echo "error al eliminar los registros de la base de datos";
    session_start();
    $_SESSION['msj'] = "Error al eliminar los registros de la base de datos";
}