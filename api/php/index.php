<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *");

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require_once __DIR__ . '/vendor/autoload.php';

    require_once "./classes/qrCode/QrCodeController.php";
    require_once "./classes/usuario/UserController.php";

    $app = AppFactory::create();
    $app->setBasePath("/test/api/php");

    $app->put('/generate', function(Request $request, Response $response, array $args){
        $controller = new QrCodeController();
        return $controller->generateQrCode($request, $response, $args);
    });

    $app->get("/user/{name}", function(Request $request, Response $response, array $args){
        $controller = new UserController();
        return $controller->getUserByName($request, $response, $args);
    });

    $app->run();
?>
