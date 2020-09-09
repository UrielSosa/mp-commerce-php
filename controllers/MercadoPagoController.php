
<?php 
    require_once 'helper.php';
    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
    MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
  
    /*Crea un objeto de preferencia*/
    $preference = new MercadoPago\Preference();

    /*Creo un producto*/
    $item = new MercadoPago\Item();
    $item->id = 1234;
    $item->title = $_POST['title'];
    $item->description = "Dispositivo móvil de Tienda e-commerce";
    $item->picture_url = url(substr($_POST["img"], 1));
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
    $preference->payment_methods = array(
        "excluded_payment_methods" => array(
            array("id" => "amex")
        ),
        "excluded_payment_types" => array(
            array("id" => "atm")
        ),
        "installments" => 6
    );

    $preference->back_urls = array(
      "success" => "http://localhost/mp-ecommerce-php/index.php",
      "failure" => "http://localhost/mp-ecommerce-php/index.php",
      "pending" => "http://localhost/mp-ecommerce-php/index.php"
    );
    $preference->auto_return = "approved";
    $preference->save();

?>