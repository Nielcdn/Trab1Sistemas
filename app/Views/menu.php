<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Briaosoft world!</title>

</head>

<?php
if (session()->get('insertSuccess')){
    echo "<strong>". session()->getFlashdata('insertSuccess') . "</strong>";
}
if (session()->get('updateSuccess')){
    echo "<i>". session()->getFlashdata('updateSuccess') . "</i>";
}
?>
<a href="/cadastro" > Cadastro </a>
<a href="/login" > Login </a>
<h1> OUTRA VIEW <?=$username?> </h1>

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
?>


<p>  Como acessar essa view?   </p>
<a href="http://localhost:8080" > volta </a>
</html>
