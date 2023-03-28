<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    class QrCodeController{
        public function __construct()
        {
            
        }

        public function generateQrCode(Request $request, Response $response, array $args){
            $usuario = (new UserController())->criarUsuario($request, $response, $args);

            $arrayParaFront = array(
                "name" => $usuario->getName(),
                "linkedinURL" => $usuario->getLinkedinURL(),
                "githubURL" => $usuario->getGithubURL()
            );

            $response->getBody()->write(json_encode($arrayParaFront));

            return $response;
        }
    }
?>