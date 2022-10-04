<?php 
$mysqli = new mysqli('localhost', 'root', '', 'scrapping_sicop');

function conectar()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "scrapping_sicop";
    $con = mysqli_connect($host, $user, $pass);
    mysqli_select_db($con, $bd);
    return $con;
}
