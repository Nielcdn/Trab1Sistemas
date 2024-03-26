<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style><?php include 'visual.css';?></style>
    <title>Trabalho 1 Biblioteca</title>

</head>
    <header>
            <div class="logo"><a href="./menu.html"><img src="../img/logo.jpeg" alt="Logo do Site"></a></div>
            <div class="banner"><h3><i>Expressar-se é a melhor forma de mudar o mundo!!</i></h3></div>
            <div class="login"><a href="login">Entrar</a></div>
            <div class="login"><a href="/cadastro">Inscreva-se</a></div>
    </header>
        <div class="login"><a href="/login">Entrar</a></div>
        <div class="login"><a href="/cadastro">Inscreva-se</a></div>
<h1> OUTRA VIEW </h1>

<form action="/pesquisar" method="post">
    <label for="mylabel">Pesquisa: </label>
    <input type="text" name="pesquisa">
    <button type="submit"  name="submit">Pequisar</button>
</form>
<br>

<h2> Dados </h2>

<?php
    foreach ($result as $row){
        echo "id:".$row['id']. "<br>";
        echo "modelo:".$row['modelo']."<br>";
        echo "marca:".$row['marca']."<br>";
        echo "Km:".$row['km']."<br>";
        echo "preco".$row['preco']."<br>";
        
        ?>
        <form action="delete" method="POST">
        <input type="hidden" name="id" value="<?=$row['id'] ?>">
        <button type="submit" name="submit">Remove via POST</button>
        </form>

        <form action="editform" method="POST">
        <input type="hidden" name="id" value="<?=$row['id'] ?>">
        <button type="submit" name="submit">Edit via POST</button>
        </form>

        <br>

        <a href="<?php echo "delete/".$row['id']?>">
        Remove via href </a>
        <br>
        
<?php
    }
?>


<p>  Como acessar essa view?   </p>
<a href="http://localhost:8080" > volta </a>
<a href="/formulario" > Inserir dados </a>
</html>
