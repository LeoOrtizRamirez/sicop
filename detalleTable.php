<?php
if (isset($_POST['search'])) {
    $valueToSearh = $_POST['valueToSearh'];
    $query = "SELECT * FROM detalle_concursos WHERE 
       cartel LIKE '%" . $valueToSearh . "%'";
    $result = filterRecord($query);
} else {
    $query = "SELECT * FROM detalle_concursos";
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
        echo 'No hay datos a exportar';
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
        <div class="header" style="display: flex !important;flex-direction: row !important;">
            <div class="row">
                <div class="col-2 sidebar">
                    <img src="src/scraping.png" alt="">
                    <h4 class="volver">Scraping www.sicop.go.cr</h4>
                    <ul class="nav nav-pills nav-sidebar">
                    </ul>
                </div>
                <div>
                    <input class="busqueda" id="busquedaInput" type="text" placeholder="Filtre aqui por palabra clave" />
                </div>
                <div class="busqueda col-2">
                    <form class="" action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Exportar a Excel</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <?php
    echo "<table class='table table-striped '>
    <thead class='thead-dark'>
    
    <tr>
    <th>#</th>
    
    <th>Estado</th>
    <th>Fecha Hora Publicacion</th>
    <th>Cartel</th>
    <th># Procedimiento</th>
    <th># Sicop 1</th>

    <th>Nombre Institucion</th>
    <th>Concurso Confidencial</th>

    <th>Encargado Publicacion</th>
    <th>Elaborador</th>
    <th>Encargado Solicitar</th>
    <th>Registro Cartel</th>
    <th>Versiones Cartel</th>
    <th>Version Consulta</th>
    <th>Descripcion Procedimiento</th>
    <th>Clasificacion Objeto</th>
    <th>Tipo Procedimiento</th>
    <th>Excepcion Contratacion Directa</th>
    <th>Tipo Modalidad</th>
    <th>Tipo Recepcion Oferta</th>
    <th>Lugar Apertura</th>
    <th>Inicio Recepcion Ofertas</th>
    <th>Cierre Recepcion Ofertas</th>
    <th>Fecha Hora Apertura Oferta</th>
    <th>Plazo Adjudicacion</th>
    <th>Presupuesto Total Estimado</th>
    <th>Presupuesto Total Estimado Usd</th>
    </tr>
    </thead>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tbody id='busquedaTable'>";
        echo "<tr>";
        echo "<td>" . $row['id_detalle_concurso'] . "</td>";
        // echo "<td>" . $row['funcionarios_relacionados_concurso'] . "</td>";
        echo "<td>" . $row['estado_concurso'] . "</td>";
        echo "<td>" . $row['fecha_hora_publicacion'] . "</td>";
        echo "<td>" . $row['cartel'] . "</td>";
        echo "<td>" . $row['numero_procedimiento'] . "</td>";
        echo "<td>" . $row['numero_sicop_1'] . "</td>";
        // echo "<td>" . $row['numero_sicop_2'] . "</td>";
        echo "<td>" . $row['nombre_institucion'] . "</td>";
        echo "<td>" . $row['concurso_confidencial'] . "</td>";
        // echo "<td>" . $row['cartel_2'] . "</td>";
        echo "<td>" . $row['encargado_publicacion_gestion_objeciones_apertura'] . "</td>";
        echo "<td>" . $row['elaborador'] . "</td>";
        echo "<td>" . $row['encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion'] . "</td>";
        echo "<td>" . $row['registro_cartel'] . "</td>";
        echo "<td>" . $row['versiones_cartel'] . "</td>";
        echo "<td>" . $row['version_consulta'] . "</td>";
        echo "<td>" . $row['descripcion_procedimiento'] . "</td>";
        echo "<td>" . $row['clasificacion_objeto'] . "</td>";
        echo "<td>" . $row['tipo_procedimiento'] . "</td>";
        echo "<td>" . $row['excepcion_contratacion_directa'] . "</td>";
        echo "<td>" . $row['tipo_modalidad'] . "</td>";
        echo "<td>" . $row['tipo_recepcion_oferta'] . "</td>";
        echo "<td>" . $row['lugar_apertura'] . "</td>";
        echo "<td>" . $row['inicio_recepcion_ofertas'] . "</td>";
        echo "<td>" . $row['cierre_recepcion_ofertas'] . "</td>";
        echo "<td>" . $row['fecha_hora_apertura_oferta'] . "</td>";
        echo "<td>" . $row['plazo_adjudicacion'] . "</td>";
        echo "<td>" . $row['presupuesto_total_estimado'] . "</td>";
        echo "<td>" . $row['presupuesto_total_estimado_usd'] . "</td>";
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