<?php
    require('db.php');

    $cpf = filter_input(INPUT_GET, 'cpf', FILTER_VALIDATE_INT);


    if($cpf){
        $sql  = $pdo->prepare("
            DELETE 
            FROM pessoas
            where cpf = :cpf;
        ");

        $sql->bindValue(':cpf', $cpf);
        $sql->execute();

        header("Location: persons.php");
    }


    ?>