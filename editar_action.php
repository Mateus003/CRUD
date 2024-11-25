<?php
    require('db.php');
    //require ('editar.php').$info['cpf'];

    $nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idade = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT);

    if($cpf){
        $sql = $pdo->prepare("
            UPDATE pessoas
            SET 
                email= :email,
                idade= :idade,
                nome=:nome
            WHERE cpf = :cpf
        ");

        $sql->bindValue(':email', $email);
        $sql->bindValue(':idade', $idade);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':cpf', $cpf);

        $sql->execute();



        header("Location: persons.php");
    }

    echo $cpf;

    ?>