<?php
    class Pessoa{
        private string $nome;
        private string $email;
        private int $cpf;
        private int $idade;

        public function getNome(){ 
            return $this->nome;
        }

        public function setNome($n){ 
            $this->nome = ucwords(trim($n));
        }

        public function getEmail(){ 
            return $this->email;
        }

        public function setEmail($e){ 
            $this->email = $e;
        }

        public function getCpf(){ 
            return $this->cpf;
        }

        public function setCpf($c){ 
            $this->cpf = strtolower(trim($c));
        }

        public function getIdade(){ 
            return $this->idade;
        }

        public function setIdade($i){ 
            $this->idade = $i;
        }

    }




?>