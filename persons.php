

<a href="index.html">Adicionar usuário</a>

<?php

require('db.php');
require_once('DAOs/PessoaDAOMysql.php');

$pessoaDao =  new PessoaDAOMysql($pdo);


//$querySql->bindValue(':n')



/*

    <a href='editar.php?cpf=$cpf'>Editar</a> 
    <a href='excluir.php?cpf=$cpf'>Excluir</a>
*/

    $itens = $pessoaDao->findAll();



?>



<table border="1" whidth="100%">

    <tr>
        <th>CPF</th>
        <th>E-mail</th>
        <th>Idade</th>
        <th>Nome</th>
        <th>Ações</th>

    </tr>

    <?php
        foreach($itens as $usuario):
    ?>
    <tr>
        <td><?=$usuario->getCpf()?></td>
        <td><?=$usuario->getEmail()?></td>
        <td><?=$usuario->getIdade()?></td>
        <td><?=$usuario->getNome()?></td>
        
        <td>
        <a href="editar.php?cpf=<?= $usuario->getCpf()?>">Editar</a>
        <a href="excluir.php?cpf=<?= $usuario->getCpf()?>">Excluir</a>
    </td>

    </tr>





<?php endforeach; ?>

</table>

