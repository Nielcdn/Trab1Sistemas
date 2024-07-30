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
<h2><a href='/addLivro'>Adicionar Livro</a></h2>
<h1> OUTRA VIEW <?=$username?>   </h1>

<form action="/pesquisar" method="post">
    <label for="mylabel">Pesquisa: </label>
    <input type="text" name="pesquisa">
    <button type="submit"  name="submit">Pequisar</button>
</form>
<br>
<h2> Dados </h2>

<?php
if (session()->get('admin')){
    
    foreach ($result as $row){
        echo "id:".$row['id']. "<br>";
        echo "nome:".$row['nome']."<br>";
        echo "email:".$row['email']."<br>";
        echo "senha:".$row['senha']."<br>";
                
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
}
?>


<p>  Como acessar essa view?   </p>
<a href="http://localhost:8080" > volta </a>
</body>
</html>
