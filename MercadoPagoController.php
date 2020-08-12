
<?php 
    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');

    /*Crea un objeto de preferencia*/
    $preference = new MercadoPago\Preference();

    /*Creo un producto*/
    $item = new MercadoPago\Item();
    $item->title = $_POST['title'];
    $item->description = "hola";
    $item->picture_url = $_POST['img'];
    $item->quantity = $_POST['unit'];
    $item->unit_price = $_POST['price'];
    $preference->items = array($item);

    /*Creo un pagador*/
    $payer = new MercadoPago\Payer();
    $payer->id = 471923173;
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

    /*Metodos de pago */
    $payment = new MercadoPago\Paymentmethod();
    var_dump($payment);
    die;
    $preference->save();
    


?>