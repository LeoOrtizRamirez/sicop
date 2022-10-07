<?php
if (isset($_POST['search'])) {
    $valueToSearh = $_POST['valueToSearh'];
    $query = "SELECT * FROM concursos WHERE 
       concurso_numero_procedimiento LIKE '%" . $valueToSearh . "%'
    OR concurso_estado LIKE '%" . $valueToSearh . "%' 
    OR concurso_entidad_contratante LIKE '%" . $valueToSearh . "%'
    OR concurso_fecha_publicacion LIKE '%" . $valueToSearh . "%'";
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
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="body">
    <header id="header">
        <div class="header" style="display: flex !important;flex-direction: row !important;">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <img src="src/scraping.png" alt="">
                    <h4 class="volver">Scraping www.sicop.go.cr</h4>
                    <ul class="nav nav-pills nav-sidebar">
                        <!-- <li class="volver"><a href="index.php" data-toggle="sidebar">Volver a menu de consulta</a></li> -->
                    </ul>
                </div>
            </div>
            <form action="" method="POST">
                <input class="busqueda" type="search" name="valueToSearh" placeholder="Filtre aqui por Codigo de proceso, estado o entidad contratante...">
                <button type="submit" class="btn btn-primary" name="search">Buscar</button>
            </form>
            <div style="margin-top: 75px;margin-left: 20px;font-size: 16px;">
                <a href="borrarTodo.php">Borrar todos los registros guardados</a>
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
    <th>Enlace a detalle completo</th>
    </tr>
    </thead>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['concurso_id'] . "</td>";
        echo "<td>" . $row['concurso_numero_procedimiento'] . "</td>";
        echo "<td>" . $row['concurso_fecha_publicacion'] . "</td>";
        echo "<td>" . $row['concurso_fecha_apertura'] . "</td>";
        echo "<td>" . $row['concurso_estado'] . "</td>";
        echo "<td>" . $row['concurso_entidad_contratante'] . "</td>";
        echo '<td> <a class="btn btn-primary" target="_blank" href="detalle.php?concurso_enlace=' . $row['concurso_enlace'] . '">Resumen</a></td>';
        echo '<td> <a target="_blank" href="detalle_context.php?concurso_enlace=' . $row['concurso_enlace'] . '">' . $row['concurso_enlace'] . '</a> </td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    </div>
    <script src="javascript.js"></script>
</body>

</html>