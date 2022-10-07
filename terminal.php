<?php
include 'vendor/autoload.php';
// include "conect.php";
require_once('concurso.php');
require_once('DetalleConcurso.php');

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

Concurso::limpiar('concursos');
Concurso::limpiar('detalle_concursos');

echo "FECHA DE PUBLICACIÓN\n";
echo "Desde:  (Ingrese su fecha en formato dd/mm/aaaa)\n";
fscanf(STDIN, "%s", $desde_publicacion);
echo "Hasta: (Ingrese su fecha en formato dd/mm/aaaa) \n";
fscanf(STDIN, "%s", $hasta_publicacion);

$desde_apertura = '09/04/2022';
$hasta_apertura = '05/12/2022';

$url = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?regDtFrom=' . $desde_publicacion . '&regDtTo=' . $hasta_publicacion . '&openbidDtFrom=' . $desde_apertura . '&openbidDtTo=' . $hasta_apertura . '';
saveData($url);

//Paginador
$client = new Client();
$client = new Client(HttpClient::create(array(
    'headers' => array(
        'Host' => 'www.sicop.go.cr',
        'Referer' => 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ600.js',
    ),
)));
$crawler = $client->request('GET', $url);

$pages = $crawler->filter('#total > span:nth-child(3)')->text();
for ($i = 2; $i <= $pages; $i++) {
    saveData('https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?regDtFrom=' . $desde_publicacion . '&regDtTo=' . $hasta_publicacion . '&instNm=&prodUnitUserYn=&openbidDtFrom=' . $desde_apertura . '&prodNm=&openbidDtTo=' . $hasta_apertura . '&page_no=' . $i);
}
/*Inicio Segundo proceso */
function guardarDetalleConcurso($url){
    echo $url;
    
    $funcionarios_relacionados_concurso = textValidation($url, 'table:nth-child(6) > tr:nth-child(2) > td:nth-child(2) > span > a');
    $estado_concurso = textValidation($url, 'table:nth-child(6) > tr:nth-child(2) > td:nth-child(4) > font');
    $fecha_hora_publicacion = textValidation($url, 'table:nth-child(6) > tr:nth-child(3) > td:nth-child(2)');
    $cartel = textValidation($url, 'table:nth-child(6) > tr:nth-child(3) > td:nth-child(4)');
    $numero_procedimiento = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(2)');
    $numero_sicop_1 = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelNo','value');
    $numero_sicop_2 = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelSeq','value');
    $nombre_institucion = textValidation($url, 'table:nth-child(6) > tr:nth-child(5) > td:nth-child(2) b');
    $concurso_confidencial = textValidation($url, 'table:nth-child(6) > tr:nth-child(5) > td:nth-child(4)');
    $cartel = textValidation($url, 'table:nth-child(6) > tr:nth-child(6) > td:nth-child(2) > a');
    $encargado_publicacion_gestion_objeciones_apertura = textValidation($url, 'table:nth-child(6) > tr:nth-child(6) > td:nth-child(2) > a');
    $elaborador = textValidation($url, 'table:nth-child(6) > tr:nth-child(6) > td:nth-child(4) > a');
    $encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion	 = textValidation($url, 'table:nth-child(6) > tr:nth-child(7) > td:nth-child(2) > a');
    $registro_cartel = textValidation($url, 'table:nth-child(6) > tr:nth-child(7) > td:nth-child(4)');
    $versiones_cartel = textValidation($url, 'table:nth-child(6) > tr:nth-child(8) > td:nth-child(2)');
    $version_consulta = textValidation($url, 'table:nth-child(6) > tr:nth-child(8) > td:nth-child(4)');
    $descripcion_procedimiento = textValidation($url, 'table:nth-child(6) > tr:nth-child(9) > td > b');
    $clasificacion_objeto = textValidation($url, 'table:nth-child(6) > tr:nth-child(10) > td');
    $tipo_procedimiento = textValidation($url, 'table:nth-child(6) > tr:nth-child(11) > td > b');
    $excepcion_contratacion_directa = textValidation($url, 'table:nth-child(6) > tr:nth-child(12) > td');
    $tipo_modalidad = textValidation($url, 'table:nth-child(6) > tr:nth-child(13) > td');
    $tipo_recepcion_oferta = textValidation($url, 'table:nth-child(6) > tr:nth-child(14) > td:nth-child(2) > b');
    $lugar_apertura = textValidation($url, 'table:nth-child(6) > tr:nth-child(14) > td:nth-child(4) > a');
    $inicio_recepcion_ofertas = textValidation($url, 'table:nth-child(6) > tr:nth-child(15) > td:nth-child(2) > b');
    $cierre_recepcion_ofertas = textValidation($url, 'table:nth-child(6) > tr:nth-child(15) > td:nth-child(4) > b');
    $fecha_hora_apertura_oferta = textValidation($url, 'table:nth-child(6) > tr:nth-child(16) > td:nth-child(2) > b');
    $plazo_adjudicacion = textValidation($url, 'table:nth-child(6) > tr:nth-child(16) > td:nth-child(4)');
    $presupuesto_total_estimado = textValidation($url, 'table:nth-child(6) > tr:nth-child(17) > td:nth-child(2)');
    $presupuesto_total_estimado_usd = textValidation($url, 'table:nth-child(6) > tr:nth-child(17) > td:nth-child(4)');
    $data = array();

    array_push($data, [
        "funcionarios_relacionados_concurso" => $funcionarios_relacionados_concurso,
        "estado_concurso" => $estado_concurso,
        "fecha_hora_publicacion" => $fecha_hora_publicacion,
        "cartel" => $cartel,
        "numero_procedimiento" => $numero_procedimiento,
        "numero_sicop_1" => $numero_sicop_1,
        "numero_sicop_2" => $numero_sicop_2,
        "nombre_institucion" => $nombre_institucion,
        "concurso_confidencial" => $concurso_confidencial,
        "cartel" => $cartel,
        "encargado_publicacion_gestion_objeciones_apertura" => $encargado_publicacion_gestion_objeciones_apertura,
        "elaborador" => $elaborador,
        "encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion" => $encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion,
        "registro_cartel" => $registro_cartel,
        "versiones_cartel" => $versiones_cartel,
        "version_consulta" => $version_consulta,
        "descripcion_procedimiento" => $descripcion_procedimiento,
        "clasificacion_objeto" => $clasificacion_objeto,
        "tipo_procedimiento" => $tipo_procedimiento,
        "excepcion_contratacion_directa" => $excepcion_contratacion_directa,
        "tipo_modalidad" => $tipo_modalidad,
        "tipo_recepcion_oferta" => $tipo_recepcion_oferta,
        "lugar_apertura" => $lugar_apertura,
        "inicio_recepcion_ofertas" => $inicio_recepcion_ofertas,
        "cierre_recepcion_ofertas" => $cierre_recepcion_ofertas,
        "fecha_hora_apertura_oferta" => $fecha_hora_apertura_oferta,
        "plazo_adjudicacion" => $plazo_adjudicacion,
        "presupuesto_total_estimado" => $presupuesto_total_estimado,
        "presupuesto_total_estimado_usd" => $presupuesto_total_estimado_usd,
    ]);
    print_r($data[0]);
    DetalleConcurso::guardar('detalle_concursos', $data[0]);
    
}
/*Fin Segundo proceso */

function saveData($url)
{
    $client = new Client();
    $client = new Client(HttpClient::create(array(
        'headers' => array(
            'Host' => 'www.sicop.go.cr',
            'Referer' => 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ600.js',
        ),
    )));
    $crawler = $client->request('GET', $url);

    $data = array();
    $crawler->filter('.eptable tr:not(:first-child)')->each(function ($node) use (&$data) {
        $link = $node->filter('.epa:nth-child(1)')->attr('href');
        $proc_num = $node->filter('td.eptdl b')->text();
        $pub_date = $node->filter('td.eptdc:nth-child(3)')->text();
        $open_date = $node->filter('td.eptdc:nth-child(4)')->text();
        $status = $node->filter('td.eptdc:nth-child(5)')->text();
        $status = ucwords($status);
        $cont_entity = $node->filter('.eptdl')->outerHTML();
        $cont_entity = ucwords($cont_entity);

        $pub_date = fromStringToDate($pub_date);
        $open_date = fromStringToDate($open_date);

        /*BUSCA LAS POSICIÓN DONDE ESTÁN LOS ELEMENTOS PARA EXTRAER EL TEXTO*/
        $findme_a   = '<br>';
        $findme_b   = '</td>';
        $pos_a = strpos($cont_entity, $findme_a);
        $pos_b = strpos($cont_entity, $findme_b);
        $cont_entity_text = substr($cont_entity, $pos_a, $pos_b);

        $link = str_replace("javascript:js_cartelSearch(", "", $link);
        $link = str_replace(");", "", $link);
        $link = explode(",", $link); //SEPARA LOS ELEMENTOS EN ARRAY
        $link[0] = str_replace("'", "", $link[0]);
        $link[1] = str_replace("'", "", $link[1]);
        $link = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ603.jsp?cartelNo=' . $link[0] . '&cartelSeq=' . $link[1];

        array_push($data, [
            "concurso_enlace" =>  $link,
            "concurso_numero_procedimiento" => $proc_num,
            "concurso_fecha_publicacion" =>  $pub_date,
            "concurso_fecha_apertura" => $open_date,
            "concurso_estado" => $status,
            "concurso_entidad_contratante" => $cont_entity_text,
        ]);
    });

    foreach ($data as $d) {
        Concurso::guardar('concursos', $d);
        guardarDetalleConcurso($d['concurso_enlace']);
    }

    echo "Guardando...";
    print_r(Concurso::obtener('concursos'));
    sleep(1);
}



function fromStringToDate($string_date)
{
    $string_date = str_replace("/", "-", $string_date);
    $datetime = new DateTime($string_date);
    return $datetime->format('Y-m-d H:i:s');
}

function textValidation($url, $selector, $value = null){
    $client = new Client(HttpClient::create(array(
        'headers' => array(
            'Referer' => 'https://www.sicop.go.cr',
        ),
    )));
    $crawler = $client->request('GET', $url);

    if(is_null($value)){
        if ($text = $crawler->filter($selector)->count()) {
            return $crawler->filter($selector)->text();
        } else {
            return '';
        }
    }else{
        if ($text = $crawler->filter($selector)->count()) {
            return $crawler->filter($selector)->attr('value');
        } else {
            return '';
        }
    }
}