<?php
function dd() {
    echo '<pre>';
    array_map(
        function($element) {
            var_dump($element);
        }, 
        func_get_args()
    );
    echo '<pre>';
    die;
}

function getQuery ($url) {
    return parse_url($url, PHP_URL_QUERY);
}

function getOtherUrl (){
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    return $queries;
}

function url($element){
    /*Tomo los datos del server, como la uri el protocolo y demas */
    $protocol = strpos($_SERVER['SERVER_PROTOCOL'],'https') !== false ? 'https://' : 'http://';
    $host = $_SERVER["HTTP_HOST"];
    $uri = $_SERVER["REQUEST_URI"];
    $url;
    
    /*Si el server es local empezamos a descomponer la uri para no tomar el nombre del archivo*/
    if(strpos($host, "localhost") === 0){
        $arrayUri = explode("/",ltrim($uri, "/"));
        $relativeUri = "";
        forEach($arrayUri as $id => $param){
            if($id != count($arrayUri) - 1){
                $relativeUri .= "/". $param;
            }
        }
        $url = $protocol . $host . $relativeUri . $element;
    } else {
        $url = $protocol . $host . '/' . $element;
    }
    dd($url);
    return $url;
}

?>