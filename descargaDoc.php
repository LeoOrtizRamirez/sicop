<?php
header('Content-Type: text/html; charset=utf-8');
$concurso_numero_procedimiento = $_GET['concurso_numero_procedimiento'];
$query = "SELECT * FROM enlace_detalle_concursos WHERE concurso_numero_procedimiento = '" . $concurso_numero_procedimiento . "' AND nombre LIKE '%Documentos del cartel: %'";
$result = filterRecord($query);
function filterRecord($query)
{
    include "conect.php";
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="body">
    <header id="header">
        <header id="header">
            <div class="row">
                <div class="col-2 sidebar">
                    <h4 class="volver">Descarga de documentos</h4>
                    </ul>
                </div>
            </div>
        </header>
    </header>
    <?php
    echo "<table class='table table-striped '>
    <thead class='thead-dark'>
    
    <tr>
    <th>No</th>
    <th>Tipo de documento</th>
	<th>Nombre del documento</th>
	<th>Archivo adjunto</th>
    </tr>
    </thead>";
    $iterator = 0;
    while ($row = mysqli_fetch_array($result)) {
        $iterator += 1;
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $iterator . "</td>";
        echo "<td>Documentos del cartel	</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td><a href='" . $row['link'] . "'>Descargar</a></td>";
        echo "</tr>";
        echo "<tbody";
    }
    echo "</table>";
    ?>
    </div>
</body>

</html>