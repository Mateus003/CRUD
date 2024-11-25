<?php

interface PessoaDAO{
    public function add(Pessoa $pessoa);

    public function findAll();

    public function findByCpf();

    public function update(Pessoa $pessoa);

    public function delete(int $cpf);

}

?>