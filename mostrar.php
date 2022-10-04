<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include("conect.php");
    require_once 'conect.php';
    $con = conectar();
    $query = "SELECT * FROM concursos";

    echo '<table class="table table-striped"> 
    <thead>
    <tr>
    <th scope="col">concurso_numero_procedimiento</th>
    <th scope="col">concurso_entidad_contratante</th>
    <th scope="col">concurso_enlace</th>
    <th scope="col">concurso_fecha_publicacion</th>
    <th scope="col">concurso_fecha_apertura</th>
    <th scope="col">concurso_estado</th>
    </tr>';
    // </thead>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $proc_num = $row["concurso_numero_procedimiento"];
            $cont_entity_text = $row["concurso_entidad_contratante"];
            // $descripcion = $row["descripcion"];
            $link = $row["concurso_enlace"];
            $pub_date = $row["concurso_fecha_publicacion"];
            $open_date = $row["concurso_fecha_apertura"];
            $status = $row["concurso_estado"];

            echo '<tr> 
                  <td>' . $proc_num . '</td> 
                  <td>' . $cont_entity_text . '</td> 
                  <td> <a href="detalle.php?link=' . $link . '">Ver detalle del proceso</a> </td> 
                  <td>' . $pub_date . '</td> 
                  <td>' . $open_date . '</td> 
                  <td>' . $status . '</td> 
              </tr>';
        }

        $result->free();
    }
    ?>
</body>

</html>