<?php
    require('db.php');

    $name =  filter_input(INPUT_POST, 'name', );

    $age = (int)filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    
    $cpf =  (int)filter_input(INPUT_POST, 'cpf',  FILTER_VALIDATE_INT);
    
    $email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    
    $info =[];
    
    if($name && $age && $cpf && $email){
        $sql = $pdo->prepare("SELECT * from pessoas where email = :email or cpf = :cpf");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();


    
        if($sql->rowCount()>0){
            $info = $sql->fetch(PDO::FETCH_ASSOC);

            if ($info['email'] === $email && $info['cpf'] === (string)$cpf) {
                echo "<script language='javascript'>";
                echo "alert('CPF e E-mail já cadastrados');";
                echo "</script>";
            } elseif ($info['email'] === $email) {
                echo "<script language='javascript'>";
                echo "alert('E-mail já cadastrado');";
                echo "</script>";
            } elseif ($info['cpf'] === (string)$cpf) {
                echo "<script language='javascript'>";
                echo "alert('CPF já cadastrado');";
                echo "</script>";
            }


            echo "<script language='javascript'>";
            echo 'history.back();';
            echo "</script>";

           
        }else{
            $sql = $pdo->prepare("
            INSERT INTO pessoas (nome, cpf, idade, email) values(:name, :cpf, :age, :email);");
        
            $sql->bindValue(':name', $name);
            $sql->bindValue(':age', $age);
            $sql->bindValue(':cpf', $cpf);
            $sql->bindValue(':email', $email);
            $sql->execute();
    
            header("Location: persons.php");
        }
       
    
        //header("Location: persons.php");
    
    }
    
?>    