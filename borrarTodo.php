<?php
include "conect.php";

$sql = "DELETE FROM `concursos` ";
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

$sql = "ALTER TABLE `concursos` AUTO_INCREMENT = 1";
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