
<?php 
    require_once 'vendor/autoload.php';
    
    MercadoPago\SDK::setAccessToken('TEST-7798463658439363-121107-8c1ec706905840ae16563056c1dd6621-227514628');

    /*Crea un objeto de preferencia*/
    $preference = new MercadoPago\Preference();

    /*Creo un producto*/
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 75.56;
    $preference->items = array($item);

    /*Creo un pagador*/
    $payer = new MercadoPago\Payer();
    $payer->name = "Lalo";
    $payer->surname = "Landa";
    $payer->email = "test_user_63274575@testuser.com";
    $payer->phone = array(
      "area_code" => "11",
      "number" => "22223333"
    );

    $payer->identification = array(
      "type" => "DNI",
      "number" => "12345678"
    );

    $payer->address = array(
      "street_name" => "False",
      "street_number" => 123,
      "zip_code" => "1111"
    );
    $preference->payer = $payer;
    $preference->save();
    var_dump($preference);
    die;
?>