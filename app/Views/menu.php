<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Briaosoft world!</title>
    <style><?php include 'visual.css';?></style>
</head>
<body>
    <header>
        <div class='login'>
        <?php
        if (session()->get($username)){
            echo '<a href="/cadastro" > Cadastro </a>';
            echo '<a href="/login" > Login </a>';
        }
        else echo '<a href="/logout" > Logout </a>'  ;
        
        ?>

        </div>

</header>
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

<h1> OUTRA VIEW <?=$username?>   </h1>

<form action="/pesquisar" method="post">
    <label for="mylabel">Pesquisa: </label>
    <input type="text" name="pesquisa">
    <button type="submit"  name="submit">Pequisar</button>
</form>
<br>
<h1><a href="/adm" > Ir para Administração </a></h1>
<h2> Dados </h2>

<?php

    
    foreach ($livro_result as $row){
        echo "autores:".$row['autores']."<br>";
        echo "titulo:".$row['titulo']."<br>";
        echo "ano:".$row['ano']."<br>";
        echo "editora:".$row['editora']."<br>";
        echo "quantDisp:".$row['quantDisp']."<br>";
                
        ?>

        <br>

        <a href="<?php echo "delete/".$row['id']?>">
        Remove via href </a>
        <br>
        
<?php
    }

?>


<p>  Como acessar essa view?   </p>
<a href="http://localhost:8080" > volta </a>
</body>
</html>
