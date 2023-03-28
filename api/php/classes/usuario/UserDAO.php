<?php
    class UserDAO{
        private static $pdo = "";

        public function __construct(){
            try {
                if(isset(self::$pdo)){
                    self::$pdo = new PDO("mysql:dbname=testbuzzvel;host=localhost;port=3306", "root", "", [PDO::ERRMODE_EXCEPTION => PDO::ATTR_ERRMODE]);
                }
            } catch (PDOException $e) {
                die("OPS: " . $e->getMessage());
            }
        }

        public function addNew(UserModel $usuario){
            $query = "INSERT INTO user (name, linkedinURL, githubURL) VALUES (:name, :linkedinURL, :githubURL)";

            $params = array(
                "name" => $usuario->getName(),
                "linkedinURL" => $usuario->getLinkedinURL(),
                "githubURL" => $usuario->getGithubURL()
            );

            try {
                self::$pdo->beginTransaction();

                $ps = self::$pdo->prepare($query);
                $ps->execute($params);

                $idInserido = self::$pdo->lastInsertId();
                self::$pdo->commit();

                return $idInserido;
            } catch (Exception $e) {
                self::$pdo->rollBack();
                throw new Exception("Erro ao inserir registro no banco de dados");
            }
        }

        public function getUserByName($name){
            $query = "SELECT * FROM user WHERE usuario.name = :name";
            $params = array(
                "name" => $name
            );

            $ps = self::$pdo->prepare($query);
            $ps->execute($params);

            return $ps->fetchAll( PDO::FETCH_ASSOC );
        }
    }