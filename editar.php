<?php
    require('db.php');
    $cpf = filter_input(INPUT_GET, 'cpf', FILTER_VALIDATE_INT);

    $info = [];



    if($cpf){
        $sql = $pdo->prepare("
            select *
            from pessoas
            where cpf =:cpf
        ");

        $sql->bindValue(':cpf', $cpf);
        $sql->execute();


        if($sql->rowCount()>0){
            $info = $sql->fetch(PDO::FETCH_ASSOC);

        }else{
            header("Location: persons.php");
        }

    }else{
        header("Location: persons.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/edit.css"/>
</head>
<body>
    <div class="form-container">
        <h1>Editar Usuário</h1>
        <form action="editar_action.php" method="POST">
            <input type="hidden" id="cpf" name="cpf" value="<?php echo htmlspecialchars($info['cpf'], ENT_QUOTES, 'UTF-8');?>">

            
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($info['nome'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email"  value="<?php echo htmlspecialchars($info['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="form-group">
                <label for="age">Idade</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($info['idade'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>

          
            <div class="form-group">
                <button type="submit">Editar</button>
            </div>
        </form>
    </div>
</body>
</html>

