<?php
    require_once __DIR__ . '/vendor/autoload.php';


    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $access_token = "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";
        MercadoPago\SDK::setAccessToken($access_token);
        
        $json = file_get_contents("php://input");
        
        header('Content-Type: application/json');
        
        error_log("========= Request Body ========= $json", 0);	
        
        echo $json;
  
        $body = json_decode($json);
  
        http_response_code(200);    
    }
?>