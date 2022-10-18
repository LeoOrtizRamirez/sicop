<?php
include "conect.php";

$sql = "TRUNCATE TABLE `concursos` ";
if (mysqli_query($mysqli, $sql)) {
    echo '<script language="javascript">';
    echo 'alert("Todos los registros fueron eliminados exitósamente");';
    echo 'window.location="index.php";';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("Error eliminando");';
    echo 'window.location="index.php";';
    echo '</script>';
}

$sql = "TRUNCATE TABLE `detalle_concursos` ";
if (mysqli_query($mysqli, $sql)) {
    echo '<script language="javascript">';
    echo 'alert("Todos los registros fueron eliminados exitósamente");';
    echo 'window.location="index.php";';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("Error eliminando");';
    echo 'window.location="index.php";';
    echo '</script>';
}

$sql = "TRUNCATE TABLE `enlace_detalle_concursos` ";
if (mysqli_query($mysqli, $sql)) {
    echo '<script language="javascript">';
    echo 'alert("Todos los registros fueron eliminados exitósamente");';
    echo 'window.location="index.php";';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("Error eliminando");';
    echo 'window.location="index.php";';
    echo '</script>';
}
