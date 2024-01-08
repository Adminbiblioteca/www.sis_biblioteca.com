<?php
include ('../../app/config/config.php');
include ('../../app/config/conexion.php');


$codigo = $_POST['codigo'];
$area = $_POST['area'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$numero = $_POST['numero'];
$ficha = $_POST['ficha'];
$editorial = $_POST['editorial'];
$formato = $_POST['formato'];
$ejemplares = $_POST['ejemplares'];
$observaciones = $_POST['observaciones'];

//extraer el area

$codigo = $_POST ['codigo'];
$texto_del_area = $_POST['area'];
$arraytext_area = explode (" " , $texto_del_area);
$letras_extraidas_del_area = "";
foreach ($arraytext_area as $letra) {
    $array_letra = str_split($letra,3);
    $letras_extraidas_del_area = $letras_extraidas_del_area. $array_letra ['0'];
}


//extraer el autor 
$texto_del_autor = $_POST['autor'];
$arraytext_autor = explode (" " , $texto_del_autor);
$letras_extraidas_del_autor = "";

foreach ($arraytext_autor as $letra_autor) {
    $array_letra_autor = str_split($letra_autor,1);
    $letras_extraidas_del_autor = $letras_extraidas_del_autor. $array_letra_autor ['0'];
}


//extraer el editorial
$texto_de_la_editorial = $_POST['editorial'];
$arraytext_editorial= explode (" " , $texto_de_la_editorial);
$letras_extraidas_de_la_editorial = "";

foreach ($arraytext_editorial as $letra_editorial) {
    $array_letra_editorial = str_split($letra_editorial,1);
    $letras_extraidas_de_la_editorial = $letras_extraidas_de_la_editorial. $array_letra_editorial ['0'];
}

//extraer el formato
$texto_del_formato = $_POST['formato'];
$arraytext_formato= explode (" " , $texto_del_formato);
$letras_extraidas_del_formato = "";

foreach ($arraytext_formato as $letra_formato) {
    $array_letra_formato = str_split($letra_formato,1);
    $letras_extraidas_del_formato = $letras_extraidas_del_formato. $array_letra_formato ['0'];
}

$codigo_generado = $letras_extraidas_del_formato . $codigo .  "-".  $letras_extraidas_del_area . $letras_extraidas_del_autor . "-"  . $letras_extraidas_de_la_editorial . $ficha;

$sentencia = $pdo->prepare('INSERT INTO tb_libros
(codigo,area,autor,editorial,titulo,numero,ficha,formato,ejemplares,observaciones,fyh_creacion,estado)
VALUES (:codigo,:area,:autor,:editorial,:titulo,:numero,:ficha,:formato,:ejemplares,:observaciones,:fyh_creacion,:estado)');

$sentencia->bindParam(':codigo',$codigo_generado);
$sentencia->bindParam(':area',$area);
$sentencia->bindParam(':autor',$autor);
$sentencia->bindParam(':editorial',$editorial);
$sentencia->bindParam(':titulo',$titulo);
$sentencia->bindParam(':numero',$numero);
$sentencia->bindParam(':ficha',$ficha);
$sentencia->bindParam(':formato',$formato);
$sentencia->bindParam(':ejemplares',$ejemplares);
$sentencia->bindParam(':observaciones',$observaciones);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    //echo 'success';
header('Location:' .$URL.'/admin/libros/index.php');
session_start();
$_SESSION['msj'] = "Se registro el libro de manera correcta";
}else{
    session_start();
    $_SESSION['msj'] = "Error al introducir la información a la base de datos.";
}
