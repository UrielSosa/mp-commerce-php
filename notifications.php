<?php 
    require_once 'controllers/MercadoPagoController.php';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        
        $json = file_get_contents("php://input");
        $body = json_decode($json);
        
        header('Content-Type: application/json');

        error_log("========= Request Body ========= $json", 0);	
        
        echo $json;
        echo $body;
    }
?>