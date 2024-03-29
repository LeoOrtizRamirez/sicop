<?php
include 'vendor/autoload.php';

use Goutte\Client;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerEscaping;
use Symfony\Component\HttpClient\HttpClient;

$concurso_enlace = $_GET['concurso_enlace'];
$concurso_enlace = ($concurso_enlace . '&cartelSeq=00');

$client = new Client(HttpClient::create(array(
	'headers' => array(
		// 'Host' => 'www.sicop.go.cr',
		'Referer' => 'https://www.sicop.go.cr',
	),
)));

$crawler = $client->request('GET', $concurso_enlace);
$funcionarios_relacionados_concurso = textValidation('table:nth-child(6) > tr:nth-child(2) > td:nth-child(2) > span > a');
$estado_concurso = textValidation('table:nth-child(6) > tr:nth-child(2) > td:nth-child(4) > font');
$fecha_hora_publicacion = textValidation('table:nth-child(6) > tr:nth-child(3) > td:nth-child(2)');
$cartel = textValidation('table:nth-child(6) > tr:nth-child(3) > td:nth-child(4)');
$numero_procedimiento = textValidation('table:nth-child(6) > tr:nth-child(4) > td:nth-child(2)');
$numero_sicop_1 = $crawler->filter('table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelNo')->attr('value');
$numero_sicop_2 = $crawler->filter('table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelSeq')->attr('value');
$nombre_institucion = textValidation('table:nth-child(6) > tr:nth-child(5) > td:nth-child(2) b');
$concurso_confidencial = textValidation('table:nth-child(6) > tr:nth-child(5) > td:nth-child(4)');
$cartel = textValidation('table:nth-child(6) > tr:nth-child(6) > td:nth-child(2) > a');
$encargado_publicacion_gestion_objeciones_apertura = textValidation('table:nth-child(6) > tr:nth-child(6) > td:nth-child(2) > a');
$elaborador = textValidation('table:nth-child(6) > tr:nth-child(6) > td:nth-child(4) > a');
$encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion	 = textValidation('table:nth-child(6) > tr:nth-child(7) > td:nth-child(2) > a');
$registro_cartel = textValidation('table:nth-child(6) > tr:nth-child(7) > td:nth-child(4)');
$versiones_cartel = textValidation('table:nth-child(6) > tr:nth-child(8) > td:nth-child(2)');
$version_consulta = textValidation('table:nth-child(6) > tr:nth-child(8) > td:nth-child(4)');
$descripcion_procedimiento = textValidation('table:nth-child(6) > tr:nth-child(9) > td > b');
$clasificacion_objeto = textValidation('table:nth-child(6) > tr:nth-child(10) > td');
$tipo_procedimiento = textValidation('table:nth-child(6) > tr:nth-child(11) > td > b');
$excepcion_contratacion_directa = textValidation('table:nth-child(6) > tr:nth-child(12) > td');
$tipo_modalidad = textValidation('table:nth-child(6) > tr:nth-child(13) > td');
$tipo_recepcion_oferta = textValidation('table:nth-child(6) > tr:nth-child(14) > td:nth-child(2) > b');
$lugar_apertura = textValidation('table:nth-child(6) > tr:nth-child(14) > td:nth-child(4) > a');
$inicio_recepcion_ofertas = $crawler->filter('table:nth-child(6) > tr:nth-child(15) > td:nth-child(2) > b')->text();
$cierre_recepcion_ofertas = textValidation('table:nth-child(6) > tr:nth-child(15) > td:nth-child(4) > b');
$fecha_hora_apertura_oferta = textValidation('table:nth-child(6) > tr:nth-child(16) > td:nth-child(2) > b');
$plazo_adjudicacion = textValidation('table:nth-child(6) > tr:nth-child(16) > td:nth-child(4)');
$presupuesto_total_estimado = textValidation('table:nth-child(6) > tr:nth-child(17) > td:nth-child(2)');
$presupuesto_total_estimado_usd = textValidation('table:nth-child(6) > tr:nth-child(17) > td:nth-child(4)');

function textValidation($selector)
{
	global $crawler;
	if ($text = $crawler->filter($selector)->count()) {
		return $crawler->filter($selector)->text();
	} else {
		return '';
	}
}

echo '<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>';

echo '<div class="container mt-4">';
echo '<h4>Detalles del concurso</h4>';
echo '<p>1. Información general</p>';
echo '<table class="table table-striped ">
<tr>
	<th class="">Funcionarios relacionados</th>
	<td class=""><a target="_blanck" href="https://www.sicop.go.cr/moduloBid/common/co/EpUserAuthList.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=">' . $funcionarios_relacionados_concurso . '</td>
	<th class="">Estado del concurso</th>
	<td class="">' . $estado_concurso . '</td>
</tr>
<tr>
	<th class="">Fecha/hora de publicación</th>
	<td class="">' . $fecha_hora_publicacion . '</td>
	<th class="">Cartel</th>
	<td class="">' . $cartel . '</td>
</tr>
<tr>
	<th class="">Número de procedimiento</th>
	<td class="">' . $numero_procedimiento . '</td>
	<th class="">Número de SICOP</th>
	<td class="">' . $numero_sicop_1 . " - " . $numero_sicop_2 . '</td>
</tr>
<tr>
	<th width="18%" class="">Nombre de la institución</th>
	<td class="">' . $nombre_institucion . '</td>
	<th class="">Concurso confidencial</th>
	<td class="">' . $concurso_confidencial . '</td>
</tr>
<tr>
	<th class="">Encargado de publicación, gestión de objeciones y apertura</th>
	<td class="">' . $encargado_publicacion_gestion_objeciones_apertura . '</td>
	<th class="">Elaborador</th>
	<td class="">' . $elaborador . '</td>
</tr>
<tr>
	<th class="">Encargado de solicitar estudio de ofertas/recomendación de adjudicación</th>
	<td class="">' . $encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion . '</td>
	<th class="">Registro del cartel</th>
	<td class="">' . $registro_cartel . '</td>
</tr>
<tr>
	<th width="18%" class="">Versiones del cartel</th>
	<td class="">' . $versiones_cartel . '</td>
	<th width="18%" class="">Versión en consulta</th>
	<td class="">' . $version_consulta . '</td>
</tr>
<tr>
	<th class="">Descripción del procedimiento</th>
	<td class="" colspan="3">' . $descripcion_procedimiento . '</td>
</tr>
<tr>
	<th class="">Clasificación del objeto</th>
	<td class="" colspan="3">' . $clasificacion_objeto . '</td>
</tr>
<tr>
	<th class="">Tipo de procedimiento</th>
	<td colspan="3" class="">' . $tipo_procedimiento . '</td>
</tr>
<tr>
	<th class="">Excepción de contratación directa</th>
	<td class="" colspan="3">' . $excepcion_contratacion_directa . '</td>
</tr>
<tr>
    <th class="">Tipo de modalidad</th>
    <td colspan="3" class="">' . $tipo_modalidad . '</td>
</tr> 
<tr>
	<th width="18%" class="">Tipo de recepción de ofertas</th>
	<td width="32%" class="">' . $tipo_recepcion_oferta . '</td>
	<th width="18%" class="">Lugar de apertura</th>
	<td width="32%" class="" colspan="3">' . $lugar_apertura . '</td>
</tr>
<tr>
	<th width="18%" class="">Inicio de recepción de ofertas</th>
	<td width="32%" class="">' . $inicio_recepcion_ofertas . '</td>
	<th width="18%" class="">Cierre de recepción de ofertas</th>
	<td width="32%" class="">' . $cierre_recepcion_ofertas . '</td>
</tr>
<tr>
	<th width="18%" class="">Fecha/hora de apertura de ofertas</th>
	<td width="32%" class="">' . $fecha_hora_apertura_oferta . '</td>
	<th width="18%" class="">Plazo de adjudicación</th>
	<td width="32%" class="">' . $plazo_adjudicacion . '</td>
</tr>
<tr>
	<th width="18%" class="">Presupuesto total estimado</th>
	<td width="32%" class="">' . $presupuesto_total_estimado . '</td>
	<th width="18%" class="">Presupuesto total estimado USD (Opcional)</th>
	<td width="32%" class="">' . $presupuesto_total_estimado_usd . '</td>
</tr></table>';
echo '</div>';
