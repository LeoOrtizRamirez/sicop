<?php
if (isset($_POST['search'])) {
	$valueToSearh = $_POST['valueToSearh'];
	$query = "SELECT * FROM detalle_concursos WHERE 
       numero_procedimiento LIKE '%" . $valueToSearh . "%'";
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

?>
<!DOCTYPE html>
<html>

<body>
	<?php
	echo "<head>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<a href='styles.css'></a>
	</head>";

	while ($row = mysqli_fetch_array($result)) {
		echo "<div class='container mt-4'>
		<h4 class='h4'>Detalles del concurso  " . $row['numero_procedimiento'] . "</h4>
		<p>1. Información general</p>
		<table class='table table-striped '>
		<tr>
		<th >Funcionarios relacionados</th>
		<td>
		<a target='_blanck' 
		href='https://www.sicop.go.cr/moduloBid/common/co/EpUserAuthList.jsp?
		cartelNo=" . $row['numero_sicop_1'] . "
		&cartelSeq=" . $row['numero_sicop_2'] . "
		&cartelCate='>
		" . $row['funcionarios_relacionados_concurso'] . "
		</td>
		<th >Estado del concurso</th>
		<td>" . $row['estado_concurso'] . "</td>
		</tr>

		<tr>
		<th >Fecha/hora de publicación</th>
		<td>" . $row['fecha_hora_publicacion'] . "</td>
		<th >Cartel</th>
		<td>" . $row['cartel'] . "</td>
		</tr>

		<tr>
		<th >Número de procedimiento</th>
		<td>" . $row['numero_procedimiento'] . "</td>
		<th >Número de SICOP</th>
		<td>" . $row['numero_sicop_1'] . '-' . $row['numero_sicop_2'] . "</td>
		</tr>

		<tr>
		<th width='18%' >Nombre de la institución</th>
		<td>" . $row['nombre_institucion'] . "</td>
		<th >Concurso confidencial</th>
		<td>" . $row['concurso_confidencial'] . "</td>
		</tr>

		<tr>
		<th >Encargado de publicación, gestión de objeciones y apertura</th>
		<td>" . $row['encargado_publicacion_gestion_objeciones_apertura'] . "</td>
		<th >Elaborador</th>
		<td>" . $row['elaborador'] . "</td>
		</tr>

		<tr>
		<th >Encargado de solicitar estudio de ofertas/recomendación de adjudicación</th>
		<td>" . $row['encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion'] . "</td>
		<th >Registro del cartel</th>
		<td>" . $row['registro_cartel'] . "</td>
		</tr>

		<tr>
		<th width='18%'>Veriones del cartel</th>
		<td>" . $row['versiones_cartel'] . "</td>
		<th width='18%'>Cartel</th>
		<td>" . $row['version_consulta'] . "</td>
		</tr>

		<tr>
		<th >Descripción del procedimiento</th>
		<td colspan='3'>" . $row['descripcion_procedimiento'] . "</td>
		</tr>

		<tr>
		<th >Clasificación del objeto</th>
		<td colspan='3'>" . $row['clasificacion_objeto'] . "</td>
		</tr>

		<tr>
		<th >Tipo de procedimiento</th>
		<td colspan='3'>" . $row['tipo_procedimiento'] . "</td>
		</tr>

		<tr>
		<th >Excepción de contratación directa</th>
		<td colspan='3'>" . $row['excepcion_contratacion_directa'] . "</td>
		</tr>

		<tr>
		<th >Tipo de modalidad</th>
		<td colspan='3'>" . $row['tipo_modalidad'] . "</td>
		</tr>

		<tr>
		<th width=''18%'>Tipo de recepción de ofertas</th>
		<td width=''32%'>" . $row['tipo_recepcion_oferta'] . "</td>
		<th >Lugar de apertura</th>
		<td>" . $row['lugar_apertura'] . "</td>
		</tr>

		<tr>
		<th width=''18%'>Inicio de recepción de ofertas</th>
		<td width=''32%'>" . $row['inicio_recepcion_ofertas'] . "</td>
		<th >Cierre de recepción de ofertas</th>
		<td>" . $row['cierre_recepcion_ofertas'] . "</td>
		</tr>

		<tr>
		<th width=''18%'>Fecha/hora de apertura de ofertas</th>
		<td width=''32%'>" . $row['fecha_hora_apertura_oferta'] . "</td>
		<th >Plazo de adjudicación</th>
		<td>" . $row['plazo_adjudicacion'] . "</td>
		</tr>

		<tr>
		<th width=''18%'>Presupuesto total estimado</th>
		<td width=''32%'>" . $row['presupuesto_total_estimado'] . "</td>
		<th >Presupuesto total estimado USD (Opcional)</th>
		<td>" . $row['presupuesto_total_estimado_usd'] . "</td>
		</tr>
		</table>
		</div>";
	}
	?>
</body>

</html>