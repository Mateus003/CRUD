<?php
require_once(__DIR__ . '/../Interfaces/PessoaDAO.php');
require_once(__DIR__ . '/../models/Pessoa.php');

    class PessoaDAOMysql implements PessoaDAO{
        private $pdo;

        public function __construct(PDO $driver)
        {
            $this->pdo = $driver;
        }

        public function add(Pessoa $pessoa){
            
        }

        public function findAll(){
            $array = [];

            $sql = $this->pdo->query("
                SELECT * 
                FROM pessoas;
            ");

            if($sql->rowCount()>0){
                $data  = $sql->fetchAll();

                foreach($data as $item){
                    $u =  new Pessoa();
                    $u->setCpf($item['cpf']);
                    $u->setNome($item['nome']);
                    $u->setIdade($item['idade']);
                    $u->setEmail($item['email']);

                    
                   $array[] = $u;
                }

            }

            return $array;
            
        }

        public function findByCpf(){

        }

        public function update(Pessoa $pessoa){}

        public function delete(int $cpf){

        }
    }
    

    ?>