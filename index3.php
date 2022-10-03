<?php
include 'vendor/autoload.php';
require_once('concurso.php');
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

echo "FECHA DE PUBLICACIÓN\n";
echo "Desde:\n";
fscanf(STDIN, "%s", $desde_publicacion);
echo "Hasta: \n";
fscanf(STDIN, "%s", $hasta_publicacion);
echo "FECHA DE APERTURA\n";
echo "Desde: \n";
fscanf(STDIN, "%s", $desde_apertura);
echo "Hasta: \n";
fscanf(STDIN, "%s", $hasta_apertura);

if($desde_publicacion == ""){
    $desde_publicacion = "04/06/2022";
}
if($hasta_publicacion == ""){
    $hasta_publicacion = date("m/d/Y");
}

if($desde_apertura == ""){
    $desde_apertura = "04/06/2022";
}
if($hasta_apertura == ""){
    $hasta_apertura = "12/02/2022";
}

$url = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cartelTestYn=Y&cartelNm=&proceType=&cartelInstCd=&instNm=&regDtFrom='.dateFormat($desde_publicacion).'&regDtTo='.dateFormat($hasta_apertura).'&openbidDtFrom='.dateFormat($desde_apertura).'&openbidDtTo='.dateFormat($hasta_apertura).'&instCartelNo=&cartelNo=&prodNm=&prodUnitUserYn=&prodUnit=&cateId=&prodCate=&biddocRcvYn=Y';

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
for ($i=2; $i < $pages; $i++) { 
    saveData('https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cateId=&proceType=&biddocRcvYn=Y&regDtTo='.dateFormat($hasta_apertura).'&regDtFrom='.dateFormat($desde_publicacion).'&instNm=&prodUnitUserYn=&openbidDtTo='.dateFormat($hasta_apertura).'&prodNm=&openbidDtFrom='.dateFormat($desde_apertura).'&instCartelNo=&cartelInstCd=&cartelTestYn=Y&cartelNo=&cartelNm=&prodCate=&prodUnit=&page_no='.$i);
    //saveData('https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ601.jsp?cateId=&proceType=&biddocRcvYn=Y&regDtTo=26%2F09%2F2022&regDtFrom=30%2F03%2F2022&instNm=&prodUnitUserYn=&openbidDtTo=25%2F11%2F2022&prodNm=&openbidDtFrom=30%2F03%2F2022&instCartelNo=&cartelInstCd=&cartelTestYn=Y&cartelNo=&cartelNm=&prodCate=&prodUnit=&page_no='.$i);
}





function saveData($url){
    $client = new Client();
    $client = new Client(HttpClient::create(array(
        'headers' => array(
            'Host' => 'www.sicop.go.cr',
            'Referer' => 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ600.js',
        ),
    )));
    $crawler = $client->request('GET', $url);

    $data = array();
    $crawler->filter('.eptable tr:not(:first-child)')->each(function ($node) use(&$data) {
        $link = $node->filter('.epa:nth-child(1)')->attr('href');
        $proc_num = $node->filter('td.eptdl b')->text();
        $pub_date = $node->filter('td.eptdc:nth-child(3)')->text();
        $open_date = $node->filter('td.eptdc:nth-child(4)')->text();
        $status = $node->filter('td.eptdc:nth-child(5)')->text();
        $cont_entity = $node->filter('.eptdl')->outerHTML();

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
        $link = explode(",", $link);//SEPARA LOS ELEMENTOS EN ARRAY
        $link[0] = str_replace("'", "", $link[0]);
        $link[1] = str_replace("'", "", $link[1]);
        $link = 'https://www.sicop.go.cr/moduloOferta/search/EP_SEJ_COQ603.jsp?cartelNo='.$link[0].'&cartelSeq='.$link[1];

        array_push($data, [
            "concurso_enlace" =>  $link,
            "concurso_numero_procedimiento" => $proc_num,
            "concurso_fecha_publicacion" =>  $pub_date,
            "concurso_fecha_apertura" => $open_date,
            "concurso_estado" => $status,
            "concurso_entidad_contratante" => $cont_entity_text,
        ]);
    });
    foreach($data as $d){
        Concurso::guardar('concursos',$d);
    }

    echo "Guardando...<br><br>";
    print_r(Concurso::obtener('concursos'));
    sleep(5);
}




function fromStringToDate($string_date){
    $string_date = str_replace("/", "-", $string_date);
    $datetime = new DateTime($string_date);
    return $datetime->format('Y-m-d H:i:s');
}


function dateFormat($date){
    $orgDate = $date;
    $newDate = date("d/m/Y", strtotime($orgDate));  
    return urlencode($newDate); 
}