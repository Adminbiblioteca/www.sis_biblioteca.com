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

// Consulta para obtener los valores actuales de la base de datos
$consulta_original = $pdo->prepare("SELECT * FROM tb_libros WHERE id_libro = :id_libro");
$consulta_original->bindParam(':id_libro', $codigo);
$consulta_original->execute();
$registro_original = $consulta_original->fetch(PDO::FETCH_ASSOC);

// Verificar y mantener los valores originales si no se actualizaron en el formulario
$area = empty($area) ? $registro_original['area'] : $area;
$autor = empty($autor) ? $registro_original['autor'] : $autor;
$editorial = empty($editorial) ? $registro_original['editorial'] : $editorial;
$titulo = empty($titulo) ? $registro_original['titulo'] : $titulo;
$numero = empty($numero) ? $registro_original['numero'] : $numero;
$ficha = empty($ficha) ? $registro_original['ficha'] : $ficha;
$formato = empty($formato) ? $registro_original['formato'] : $formato;
$ejemplares = empty($ejemplares) ? $registro_original['ejemplares'] : $ejemplares;




// ... (otros campos que no quieres que se vuelvan en blanco

$sentencia = $pdo->prepare("UPDATE tb_libros SET
codigo = :codigo,
area = :area,
autor = :autor,
editorial = :editorial,
titulo = :titulo,
numero = :numero,
ficha = :ficha,
formato = :formato,
ejemplares = :ejemplares,
observaciones = :observaciones,
fyh_actualizacion = :fyh_actualizacion WHERE id_libro = :id_libro");

$sentencia->bindParam(':codigo', $codigo_generado);
$sentencia->bindParam(':area', $area);
$sentencia->bindParam(':autor', $autor);
$sentencia->bindParam(':editorial', $editorial);
$sentencia->bindParam(':titulo', $titulo);
$sentencia->bindParam(':numero', $numero);
$sentencia->bindParam(':ficha', $ficha);
$sentencia->bindParam(':formato', $formato);
$sentencia->bindParam(':ejemplares', $ejemplares);
$sentencia->bindParam(':observaciones', $observaciones);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_libro', $codigo);

if ($sentencia->execute()) {
    //echo 'success';
    header('Location:' . $URL . '/admin/libros/index.php');
    session_start();
    $_SESSION['msj'] = "Se actualizó el libro de manera correcta";
} else {
    session_start();
    $_SESSION['msj'] = "Error al introducir la información a la base de datos.";
}
