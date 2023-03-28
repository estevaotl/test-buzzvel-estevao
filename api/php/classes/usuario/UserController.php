<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    require_once "UserDAO.php";
    require_once "UserModel.php";

    class UserController{
        public function __construct()
        {
            
        }

        public function criarUsuario(Request $request, Response $response, array $args){
            try {
                $data = $request->getParsedBody();

                $userDAO = new UserDAO();

                $usuario = new UserModel();
                $usuario->setName($data['name']);
                $usuario->setLinkedinURL($data['linkedinURL']);
                $usuario->setGithubURL($data['githubURL']);

                $idUsuario = $userDAO->addNew($usuario);
                $usuario->setId($idUsuario);

                return $usuario;
            } catch (Exception $e) {
                // $mensagem = array("mensagem" => $e->getMessage());

                // $response->getBody()->write(json_encode($mensagem));

                // return $response
                //     ->withHeader("Content-Type", "application/json")
                //     ->withStatus(500);
            }
        }

        public function getUserByName(Request $request, Response $response, array $args){
            $mensagem = "";
            try {
                $userDAO = new UserDAO();

                $usuario = $userDAO->getUserByName($args['name'])[0];

                $usuarioParaFront = array(
                    "name" => $usuario['name'],
                    "githubURL" => $usuario['githubURL'],
                    "linkedinURL" => $usuario['linkedinURL']
                );

                $response->getBody()->write(json_encode($usuarioParaFront));

                return $response
                    ->withHeader("Content-Type", "application/json")
                    ->withStatus(200);
            } catch (Exception $e) {
                $mensagem = array("mensagem" => $e->getMessage());

                $response->getBody()->write(json_encode($mensagem));

                return $response
                    ->withHeader("Content-Type", "application/json")
                    ->withStatus(500);
            }
        }
    }
?>