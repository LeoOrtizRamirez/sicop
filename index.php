<?php
if (isset($_POST['search'])) {
    $valueToSearh = $_POST['valueToSearh'];
    $query =
        $query = "SELECT * FROM concursos WHERE concurso_numero_procedimiento LIKE '%" . $valueToSearh . "%' OR concurso_estado LIKE '%" . $valueToSearh . "%' OR concurso_entidad_contratante LIKE '%" . $valueToSearh . "%'";
    $result = filterRecord($query);
} else {
    $query = "SELECT * FROM concursos";
    $result = filterRecord($query);
}

function filterRecord($query)
{
    include "conect.php";
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
}

/*Inicio - Exportar a Excel */
if (isset($_POST["export_data"])) {
    while ($row = mysqli_fetch_assoc($result)) {
        $concursos[] = $row;
    }
    if (!empty($concursos)) {
        $filename = "concursos.xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename);
        $mostrar_columnas = false;
        foreach ($concursos as $concurso) {
            if (!$mostrar_columnas) {
                echo implode("\t", array_keys($concurso)) . "\n";
                $mostrar_columnas = true;
            }
            echo implode("\t", array_values($concurso)) . "\n";
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("No hay datos a exportar");';
        echo 'window.location="index.php";';
        echo '</script>';
    }
    exit;
}
/*Fin - Exportar a Excel */
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
        <div class="encabezado">
            <div class="row">
                <div class="col-2">
                    <img src="src/lici.png" alt="" style="margin-top: 55px;">
                    <img src="src/scra.png" alt="">
                    <!-- <img src="src/scraping.png" alt=""> -->
                    <!-- <h4 class="volver">Scraping www.sicop.go.cr</h4> -->
                </div>
                <div>
                    <input class="busqueda" id="busquedaInput" type="text" placeholder="Filtre aqui por palabra clave" />
                </div>
                <div class="busqueda col-2">
                    <form class="" action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Exportar a Excel</button>
                        <br><br>
                        <a class="btn btn-danger" href="borrarTodo.php">Borrar registros</a>
                    </form>
                </div>
                <div>
                    <!-- <h4 style="margin-top: 75px;">Informacion completa</h4> -->
                    <div>
                        <a style="margin-top: 73px;" class="btn btn-secondary" target="_blank" href="detalleForm.php">Vista formulario</a>
                        <!-- <br><br> -->
                        <a style="margin-top: 73px;" class="btn btn-secondary" target="_blank" href="detalleTable.php">Vista tabla</a>
                        <!-- <br><br> -->
                        <a style="margin-top: 73px;" class="btn btn-secondary" target="_blank" href="detalleTableBtn.php">Vista botones</a>
                        <!-- <br><br> -->
                    </div>
                </div>
                <div>
                    <img src="src/bot.png" alt="">
                </div>
            </div>
        </div>
    </header>
    <?php
    echo "<table class='table table-striped '>
    <thead class='thead-dark'>
    <tr>
    <th>#</th>
    <th>Numero de procedimiento</th>
    <th>Fecha Publicacion</th>
    <th>Fecha Apertura</th>
    <th>Estado</th>
    <th>Entidad Contratante</th>
    <th></th>
    <th></th>
    <th>Enlace a detalle completo</th>
    </tr>
    </thead>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tbody id='busquedaTable'>";
        echo "<tr>";
        echo "<td>" . $row['concurso_id'] . "</td>";
        echo "<td>" . $row['concurso_numero_procedimiento'] . "</td>";
        echo "<td>" . $row['concurso_fecha_publicacion'] . "</td>";
        echo "<td>" . $row['concurso_fecha_apertura'] . "</td>";
        echo "<td>" . $row['concurso_estado'] . "</td>";
        echo "<td>" . $row['concurso_entidad_contratante'] . "</td>";
        echo '<td> <a class="btn btn-primary" target="_blank" href="detalle.php?concurso_enlace=' . $row['concurso_enlace'] . '">Resumen</a></td>';
        echo '<td> <a class="btn btn-primary" target="_blank" href="descargaDoc.php?concurso_enlace=' . $row['concurso_enlace'] . '">Descargas</a></td>';
        echo '<td> <a target="_blank" href="detalle_context.php?concurso_enlace=' . $row['concurso_enlace'] . '">' . $row['concurso_enlace'] . '</a> </td>';
        echo "</tr>";
        echo "<tbody";
    }
    echo "</table>";
    ?>
    </div>
    <script src="javascript.js"></script>
    <script src="filtrar.js"></script>
</body>

</html>