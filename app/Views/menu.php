<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
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

<?php if (session()->get('logado')) '<h1>Seja Bem Vindo, <?=$username?>!!!   </h1>' ?>
<br>
<?php if (session()->get('adm')) echo '<h1><a href="/adm" > Ir para Administração </a></h1>'?>
<h2> Dados </h2>

<?php
    if (session()->get('logado')){
        if (!$emprestimos) echo '<h3>Nenhum livro foi pego emprestado!<br><br></h3>';
        else {
            foreach ($emprestimos as $row){
                echo "autores:".$row['autores']."<br>";
                echo "titulo:".$row['titulo']."<br>";
                echo "ano:".$row['ano']."<br>";
                echo "editora:".$row['editora']."<br>";
                echo "quantDisp:".$row['quantDisp']."<br>";
                ?>
    
                <br>
            
                <a href="<?php echo "devolver/".$row['id']?>">
                Devolver Livro </a>
                <br><br>
            
        <?php
            }
        }
    }
    ?>
    <br><br>
    <form action="pesquisar" method="post">
        <input type="hidden" class="form-control" id="tipo" name="tipo" value="todos">
        <button type="submit" class="btn btn-primary" name="submit">Listar Todos os Livros</button>
    </form>
    <form action="pesquisar" method="post">
        <input type="hidden" class="form-control" id="tipo" name="tipo" value="porAno">
        <button type="submit" class="btn btn-primary" name="submit">Listar Livros por Ano (Decrescente)</button>
    </form>
    <form action="pesquisar" method="post">
        <input type="hidden" class="form-control" id="tipo" name="tipo" value="porTitulo">
        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="tituloInputLabel">Pesquisar por Titulo:</label>
                <input type="text" class="form-control" id="tituloInputLabel" name="titulo">
                <button type="submit" class="btn btn-primary" name="submit">Pesquisar</button>
            </div>
        </div>
    </form>
    <div class="pop">
        <?php
        if (session()->get('resultados')){
    foreach ($resultados as $row){
        echo "autores:".$row['autores']."<br>";
        echo "titulo:".$row['titulo']."<br>";
        echo "ano:".$row['ano']."<br>";
        echo "editora:".$row['editora']."<br>";
        echo "userEmprest:".$row['userEmprest']."<br>";
        echo "quantDisp:".$row['quantDisp']."<br>";
        ?>

        <br>

        <a href="<?php echo "pegar/".$row['id']?>">
        Pegar Livro </a>
        <br><br><br>
    
<?php
    }
}
else{
    foreach ($livro_result as $row){
        echo "autores:".$row['autores']."<br>";
        echo "titulo:".$row['titulo']."<br>";
        echo "ano:".$row['ano']."<br>";
        echo "editora:".$row['editora']."<br>";
        echo "userEmprest:".$row['userEmprest']."<br>";
        echo "quantDisp:".$row['quantDisp']."<br>";
        ?>

        <br>

        <a href="<?php echo "pegar/".$row['id']?>">
        Pegar Livro </a>
        <br><br><br>
    
<?php
    }
}

?>
</div>
</main>
</body>
</html>