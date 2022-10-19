<?php
include 'vendor/autoload.php';
require_once('concurso.php');
require_once('DetalleConcurso.php');
require_once('C:\xampp\htdocs\Proyecto\sicop\EnlacesDetalleConcurso.php');

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

Concurso::limpiar('concursos');
Concurso::limpiar('detalle_concursos');
EnlacesDetalleConcurso::limpiar('enlace_detalle_concursos');

echo "FECHA DE PUBLICACIÓN\n";
echo "Desde:  (Ingrese su fecha en formato dd/mm/aaaa)\n";
fscanf(STDIN, "%s", $desde_publicacion);
echo "Hasta: (Ingrese su fecha en formato dd/mm/aaaa) \n";
fscanf(STDIN, "%s", $hasta_publicacion);

$desde_apertura = '09/04/2022';
$hasta_apertura = '05/12/2022';

global $name;

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
function guardarDetalleConcurso($url)
{
    //echo $url;
    $funcionarios_relacionados_concurso = textValidation($url, 'table:nth-child(6) > tr:nth-child(2) > td:nth-child(2) > span > a');
    $estado_concurso = textValidation($url, 'table:nth-child(6) > tr:nth-child(2) > td:nth-child(4) > font');
    $fecha_hora_publicacion = textValidation($url, 'table:nth-child(6) > tr:nth-child(3) > td:nth-child(2)');
    $cartel = textValidation($url, 'table:nth-child(6) > tr:nth-child(3) > td:nth-child(4)');
    $numero_procedimiento = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(2)');
    $numero_sicop_1 = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelNo', 'value');
    $numero_sicop_2 = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelSeq', 'value');
    $nombre_institucion = textValidation($url, 'table:nth-child(6) > tr:nth-child(5) > td:nth-child(2) b');
    $concurso_confidencial = textValidation($url, 'table:nth-child(6) > tr:nth-child(5) > td:nth-child(4)');
    $cartel = textValidation($url, 'table:nth-child(6) > tr:nth-child(6) > td:nth-child(2) > a');
    $encargado_publicacion_gestion_objeciones_apertura = textValidation($url, 'table:nth-child(6) > tr:nth-child(6) > td:nth-child(2) > a');
    $elaborador = textValidation($url, 'table:nth-child(6) > tr:nth-child(6) > td:nth-child(4) > a');
    $encargado_solicitar_estudio_ofertas_recomendacion_adjudicacion     = textValidation($url, 'table:nth-child(6) > tr:nth-child(7) > td:nth-child(2) > a');
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
    //print_r($data[0]);
    DetalleConcurso::guardar('detalle_concursos', $data[0]);

    guardarEnlacesDetalleConcurso($url);
}
/*Fin Segundo proceso */

/*Inicio Tercer proceso*/
function guardarEnlacesDetalleConcurso($url)
{
    //Botones encabezado
    $numero_sicop_1 = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelNo', 'value');
    $numero_sicop_2 = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(4) > input.epreadc.readonly.fixCartelSeq', 'value');
    $numero_procedimiento = textValidation($url, 'table:nth-child(6) > tr:nth-child(4) > td:nth-child(2)');
    //$proc_num = $numero_sicop_1;
    $proc_num = textValidation($url, 'td.eptdl b');
    $historial_modificaciones_cartel = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ604.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2;
    $consulta_notificaciones = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ724.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&instCartelNo=' . $numero_procedimiento;
    $historial_modificaciones_presupuesto = 'https://www.sicop.go.cr/moduloBid/etc/EP_ETJ_EXQ876.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2;
    $funcionarios_relacionados_concurso = 'https://www.sicop.go.cr/moduloBid/common/co/EpUserAuthList.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=';
    $aplicacion_sistema = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ625.jsp?isView=Y&progId=coq603&cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&isPopup=';
    $solicitud_aclaracion = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_POI018.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&biddocTypeCd=XM'; //Requiere login
    $consulta_aclaracion = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_COQ015.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&isPopup=';
    $first_data = array();
    array_push($first_data, [
        "concurso_numero_procedimiento" => $proc_num,
        "nombre" => "historial_modificaciones_cartel",
        "link" => $historial_modificaciones_cartel,
    ]);
    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $first_data[0]);
    $first_data = array();
    array_push($first_data, [
        "concurso_numero_procedimiento" => $proc_num,
        "nombre" => "consulta_notificaciones",
        "link" => $consulta_notificaciones,
    ]);
    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $first_data[0]);
    $first_data = array();
    array_push($first_data, [
        "concurso_numero_procedimiento" => $proc_num,
        "nombre" => "historial_modificaciones_presupuesto",
        "link" => $historial_modificaciones_presupuesto,
    ]);
    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $first_data[0]);
    $first_data = array();
    array_push($first_data, [
        "concurso_numero_procedimiento" => $proc_num,
        "nombre" => "funcionarios_relacionados_concurso",
        "link" => $funcionarios_relacionados_concurso,
    ]);
    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $first_data[0]);
    $first_data = array();
    array_push($first_data, [
        "concurso_numero_procedimiento" => $proc_num,
        "nombre" => "aplicacion_sistema",
        "link" => $aplicacion_sistema,
    ]);
    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $first_data[0]);
    $first_data = array();
    array_push($first_data, [
        "concurso_numero_procedimiento" => $proc_num,
        "nombre" => "solicitud_aclaracion",
        "link" => $solicitud_aclaracion,
    ]);
    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $first_data[0]);
    $first_data = array();
    array_push($first_data, [
        "concurso_numero_procedimiento" => $proc_num,
        "nombre" => "consulta_aclaracion",
        "link" => $consulta_aclaracion,
    ]);
    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $first_data[0]);
    $first_data = array();
    //[ 11. Información de bien, servicio u obra ]
    $client = new Client();
    $client = new Client(HttpClient::create(array(
        'headers' => array(
            'Host' => 'www.sicop.go.cr',
            'Referer' => 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ600.js',
        ),
    )));
    $crawler = $client->request('GET', $url);

    $primera_vez = true;
    $crawler->filterXPath('.//table[count(.//td[@rowspan]) > 0]//tr[not(self::node()[not(preceding-sibling::*)])]')->each(function ($node) use (&$proc_num, &$numero_sicop_1, &$numero_sicop_2, &$partida, &$primera_vez) {
        //A las filas diferentes a la primera se les resta 1 posicion (td:nth-child(8))
        if ($node->filter('td:nth-child(1)')->attr('rowspan') == 1 && $primera_vez) {
            $primera_vez = false;
            //Verifica que exista un botón
            if ($node->filter('td:nth-child(8) > span > a')->count()) {
                $partida = $node->filter('td:nth-child(2)')->text();
                $detalle_partida = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $partida;
                $informacion_bien_servicio_obra = array();
                array_push($informacion_bien_servicio_obra, [
                    "concurso_numero_procedimiento" => $proc_num,
                    "nombre" => "detalle_partida",
                    "link" => $detalle_partida,
                ]);
                EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
            }

            if ($node->filter('td:nth-child(2)')->count()) {
                $linea = 1;
                $detalle_linea = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $partida . '&cateSeqno=' . $linea;
                $informacion_bien_servicio_obra = array();
                array_push($informacion_bien_servicio_obra, [
                    "concurso_numero_procedimiento" => $proc_num,
                    "nombre" => "detalle_linea",
                    "link" => $detalle_linea,
                ]);
                EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
            }
        } else {
            if ($primera_vez) {
                $primera_vez = false;
                if ($node->filter('td:nth-child(8) > span > a')->count()) {
                    $partida = $node->filter('td:nth-child(2)')->text();
                    $detalle_partida = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $partida;
                    $informacion_bien_servicio_obra = array();
                    array_push($informacion_bien_servicio_obra, [
                        "concurso_numero_procedimiento" => $proc_num,
                        "nombre" => "detalle_partida",
                        "link" => $detalle_partida,
                    ]);
                    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);


                    if ($node->filter('td:nth-child(2)')->count()) {
                        $linea = 1; //Para evitar contenido oculto en td -- Motivo de anulación
                        $detalle_linea = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $partida . '&cateSeqno=' . $linea;
                        $informacion_bien_servicio_obra = array();
                        array_push($informacion_bien_servicio_obra, [
                            "concurso_numero_procedimiento" => $proc_num,
                            "nombre" => "detalle_linea",
                            "link" => $detalle_linea,
                        ]);
                        EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
                    }
                } else {
                    echo "no encontro detalle \n";
                }
            } else {
                if ($node->filter('td:nth-child(7) > span > a')->count()) {
                    $partida = $node->filter('td:nth-child(1)')->text();
                    $detalle_partida = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $partida;
                    $informacion_bien_servicio_obra = array();
                    array_push($informacion_bien_servicio_obra, [
                        "concurso_numero_procedimiento" => $proc_num,
                        "nombre" => "detalle_partida",
                        "link" => $detalle_partida,
                    ]);
                    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
                } else {
                    echo "no encontro detalle \n";
                }

                if ($node->filter('td:nth-child(1)')->count()) {
                    $linea = $node->filter('td:nth-child(1)')->text();
                    $detalle_linea = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXQ005.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $partida . '&cateSeqno=' . $linea;
                    $informacion_bien_servicio_obra = array();
                    array_push($informacion_bien_servicio_obra, [
                        "concurso_numero_procedimiento" => $proc_num,
                        "nombre" => "detalle_linea",
                        "link" => $detalle_linea,
                    ]);
                    EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
                }
            }
        }
    });

    //[ 12. Procesos por partida ]
    $cartel_version = $crawler->filter('input[name="cartelVersion"]')->attr('value');
    $crawler->filterXPath('.//table[count(.//td[@rowspan]) > 0]/following-sibling::table[1] //tr[not(self::node()[not(preceding-sibling::*)])]')->each(function ($node) use (&$proc_num, &$numero_sicop_1, &$numero_sicop_2, &$partida, &$primera_vez, &$cartel_version) {
        $name = $node->filter('td:nth-child(1)')->text();
        $cartel_cate = str_replace("Partida", "", $name);
        $cartel_cate = str_replace(" ", "", $name);
        $cartel_progress_cd = "01"; //pendiente revisar en apertura finalizada.

        if ($node->filter('td:nth-child(2) > span:nth-child(1) > a')->count()) {
            $presentar_recurso = 'https://www.sicop.go.cr/moduloBid/cgr/Ep_CgrRecursoSelect.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $cartel_cate . '&cartelVersion=' . $cartel_version . '&recursoCate=CT';
            $informacion_bien_servicio_obra = array();
            array_push($informacion_bien_servicio_obra, [
                "concurso_numero_procedimiento" => $proc_num,
                "nombre" => $name . "_presentar_recurso",
                "link" => $presentar_recurso,
            ]);
            EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
        }
        if ($node->filter('td:nth-child(2) > span:nth-child(2) > a')->count()) {
            $consultar = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_POQ400.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $cartel_cate . '&reqNew=1';
            $informacion_bien_servicio_obra = array();
            array_push($informacion_bien_servicio_obra, [
                "concurso_numero_procedimiento" => $proc_num,
                "nombre" => $name . "_consultar",
                "link" => $consultar,
            ]);
            EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
        }
        if ($node->filter('td:nth-child(3) > span > a')->count()) {
            $ofertar = 'https://www.sicop.go.cr/moduloOferta/servlet/oferta/EP_OTV_PNA100?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $cartel_cate;
            $informacion_bien_servicio_obra = array();
            array_push($informacion_bien_servicio_obra, [
                "concurso_numero_procedimiento" => $proc_num,
                "nombre" => $name . "_ofertar",
                "link" => $ofertar,
            ]);
            EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
        }
        if ($node->filter('td:nth-child(4) > span:nth-child(1) > a')->count()) {
            $resultado_apertura = 'https://www.sicop.go.cr/moduloOferta/servlet/search/EP_SEV_COQ622?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $cartel_cate . '&cartelProgressCd=' . $cartel_progress_cd;
            $informacion_bien_servicio_obra = array();
            array_push($informacion_bien_servicio_obra, [
                "concurso_numero_procedimiento" => $proc_num,
                "nombre" => $name . "_resultado_apertura",
                "link" => $resultado_apertura,
            ]);
            EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
        }
        if ($node->filter('td:nth-child(4) > span:nth-child(3) > a')->count()) {
            $motivo_anulacion = 'https://www.sicop.go.cr/moduloBid/cartel/EP_CTJ_EXA011.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $cartel_cate;
            $informacion_bien_servicio_obra = array();
            array_push($informacion_bien_servicio_obra, [
                "concurso_numero_procedimiento" => $proc_num,
                "nombre" => $name . "_motivo_anulacion",
                "link" => $motivo_anulacion,
            ]);
            EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
        }
        if ($node->filter('td:nth-child(4) > span:nth-child(3) > a')->count()) {
            $resultado_evaluacion = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ607.jsp?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelCate=' . $cartel_cate . '&cartelProgressCd=' . $cartel_progress_cd;
            $informacion_bien_servicio_obra = array();
            array_push($informacion_bien_servicio_obra, [
                "concurso_numero_procedimiento" => $proc_num,
                "nombre" => $name . "_resultado_evaluacion",
                "link" => $resultado_evaluacion,
            ]);
            EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
        }
    });

    //[ F. Documento del cartel ]
    $cartel_version = $crawler->filter('input[name="cartelVersion"]')->attr('value');
    $crawler->filterXPath('.//table[count(.//td[@rowspan]) > 0]/preceding-sibling::table[1] //tr[not(self::node()[not(preceding-sibling::*)])]')->each(function ($node) use (&$proc_num, &$numero_sicop_1, &$numero_sicop_2, &$partida, &$primera_vez, &$cartel_version) {
        $doc_file_seqno = $node->filter('td:nth-child(1)')->text();

        if ($node->filter('td:nth-child(4) > a')->count()) {
            $name = $node->filter('td:nth-child(4) > a')->text();
            $link = 'https://www.sicop.go.cr/moduloBid/servlet/cartel/EP_CTV_EXA008?cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2 . '&cartelVersion=' . $cartel_version . '&docFileSeqno=' . $doc_file_seqno . '&loginYn=N&cmd=downloadFile';
            $informacion_bien_servicio_obra = array();
            array_push($informacion_bien_servicio_obra, [
                "concurso_numero_procedimiento" => $proc_num,
                "nombre" => "Documentos del cartel: " . $name,
                "link" => $link,
            ]);
            EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
        }
    });

    //Ultimos botones
    if ($crawler->filter('p[align="right"] > span:nth-child(1) > a')->count()) {
        $resultado_solicitud_verificacion = 'https://www.sicop.go.cr/moduloBid/common/review/EpExamReqListQ.jsp?cartelNo=' . $numero_sicop_1 . '&cartelCate=&retVal=EXQ861&beforeBtnYn=Y';
        $informacion_bien_servicio_obra = array();
        array_push($informacion_bien_servicio_obra, [
            "concurso_numero_procedimiento" => $proc_num,
            "nombre" => $name . "_resultado_solicitud_verificacion",
            "link" => $resultado_solicitud_verificacion,
        ]);
        EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
    }
    if ($crawler->filter('p[align="right"] > span:nth-child(2) > a')->count()) {
        $condiciones_declaraciones = 'https://www.sicop.go.cr/moduloOferta/oferta/EP_OTJ_PNQ031.jsp?isView=Y&cartelNo=' . $numero_sicop_1 . '&cartelSeq=' . $numero_sicop_2;
        $informacion_bien_servicio_obra = array();
        array_push($informacion_bien_servicio_obra, [
            "concurso_numero_procedimiento" => $proc_num,
            "nombre" => $name . "_condiciones_declaraciones",
            "link" => $condiciones_declaraciones,
        ]);
        EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
    }
    if ($crawler->filter('p[align="right"] > span:nth-child(3) > a')->count()) {
        $listado = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cateId=&proceType=&biddocRcvYn=Y&regDtTo=' . $hasta_publicacion . '&regDtFrom=' . $desde_publicacion . '&instNm=&prodUnitUserYn=&openbidDtTo=15%2F12%2F2022&prodNm=&openbidDtFrom=19%2F04%2F2022&instCartelNo=&cartelInstCd=&cartelTestYn=Y&cartelNo=&cartelNm=&prodCate=&prodUnit=';
        $informacion_bien_servicio_obra = array();
        array_push($informacion_bien_servicio_obra, [
            "concurso_numero_procedimiento" => $proc_num,
            "nombre" => $name . "_listado",
            "link" => $listado,
        ]);
        EnlacesDetalleConcurso::guardar('enlace_detalle_concursos', $informacion_bien_servicio_obra[0]);
    }
}
/*Fin Tercer proceso */

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
        $findme_a   = '\n';
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
    //print_r(Concurso::obtener('concursos'));
    sleep(1);
}

function fromStringToDate($string_date)
{
    $string_date = str_replace("/", "-", $string_date);
    $datetime = new DateTime($string_date);
    return $datetime->format('Y-m-d H:i:s');
}

function textValidation($url, $selector, $value = null)
{
    $client = new Client(HttpClient::create(array(
        'headers' => array(
            'Referer' => 'https://www.sicop.go.cr',
        ),
    )));
    $crawler = $client->request('GET', $url);

    if (is_null($value)) {
        if ($text = $crawler->filter($selector)->count()) {
            return $crawler->filter($selector)->text();
        } else {
            return '';
        }
    } else {
        if ($text = $crawler->filter($selector)->count()) {
            return $crawler->filter($selector)->attr('value');
        } else {
            return '';
        }
    }
}
