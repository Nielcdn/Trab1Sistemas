<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administração</title>
    <style><?php include 'visual.css';?></style>
</head>
<body>
    <header>
    <div class="logo"><a href="/menu">Menu</a></div>
    <div class="banner"><h3><i>Expressar-se é a melhor forma de mudar o mundo!!</i></h3></div>

        <?php
        if (session()->get($username)){
            echo '<div class="login"><a href="/cadastro" > Cadastro </a></div>';
            echo '<div class="login"><a href="/login" > Login </a></div>';
        }
        else echo '<div class="login"><a href="/logout" > Logout </a></div>'  ;
        
        ?>

</header>
<main>
<?php
if (session()->get('insertSuccess')){
    echo "<strong>". session()->getFlashdata('insertSuccess') . "</strong>";
}
if (session()->get('updateSuccess')){
    echo "<i>". session()->getFlashdata('updateSuccess') . "</i>";
}
if (session()->get('adm')){
    echo "<i>". session()->getFlashdata('adm') . "</i>";
}
?>
<h2><a href='/addLivro'>Adicionar Livro</a></h2>
<h1> Olá <?=$username?>!!   </h1>

<form action="/pesquisar" method="post">
    <label for="mylabel">Pesquisa: </label>
    <input type="text" name="pesquisa">
    <button type="submit"  name="submit">Pequisar</button>
</form>
<br>
<h2> Dados </h2>
<div class="pop">
<?php
if (session()->get('adm')){
    echo '<h3>Usuários:</h3><br><br>';
    foreach ($result as $row){
        echo "id:".$row['id']. "<br>";
        echo "nome:".$row['nome']."<br>";
        echo "email:".$row['email']."<br>";
        echo "senha:".$row['senha']."<br>";
        ?>
        <form action="deleteUsuario" method="POST">
        <input type="hidden" name="id" value="<?=$row['id'] ?>">
        <button type="submit" name="submit">Remover</button>
        </form>

        <form action="editUsuario" method="POST">
        <input type="hidden" name="id" value="<?=$row['id'] ?>">
        <button type="submit" name="submit">Editar</button>
        </form>
        <br>
        
<?php
    }
    echo'</div><br>br><br><h3>Livros:</h3><div class="pop"';
    foreach ($livro_result as $row){
        echo "id:".$row['id']. "<br>";
        echo "autores:".$row['autores']."<br>";
        echo "titulo:".$row['titulo']."<br>";
        echo "ano:".$row['ano']."<br>";
        echo "editora:".$row['editora']."<br>";
        echo "userEmprest:".$row['userEmprest']."<br>";
        echo "quantDisp:".$row['quantDisp']."<br>";
        ?>
        <form action="deleteLivro" method="POST">
        <input type="hidden" name="id" value="<?=$row['id'] ?>">
        <button type="submit" name="submit">Remover</button>
        </form>

        <form action="editLivro" method="POST">
        <input type="hidden" name="id" value="<?=$row['id'] ?>">
        <button type="submit" name="submit">Editar</button>
        </form>
        <br>
        
<?php
    }

}
else{
    echo 'Essa área é só para administradores!!!';
}
?>
</main>
</body>
</html>