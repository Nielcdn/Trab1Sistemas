<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style><?php include 'visual.css';?></style>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
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
    <form action="updateLivro" method="post">
    <input type="hidden" class="form-control" id="idInputLabel" name="id_for_updating" value="<?=$result['id']?>">
  <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="autoresInputLabel">Autores:</label>
      <input type="text" class="form-control" id="autoresInputLabel" name="autores_edit" value="<?=$result['autores']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="tituloInputLabel">Título:</label>
      <input type="text" class="form-control" id="tituloInputLabel" name = "titulo_edit" value="<?=$result['titulo']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="anoInputLabel">Ano:</label>
      <input type="number" class="form-control" id="anoInputLabel" name="ano_edit" value="<?=$result['ano']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="editoraInputLabel">Editora:</label>
      <input type="text" class="form-control" id="editoraInputLabel" name = "editora_edit" value="<?=$result['editora']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="quantDispInputLabel">Quantidade Disponível:</label>
      <input type="number" class="form-control" id="quantDispInputLabel" name = "quantDisp_edit" value="<?=$result['quantDisp']?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br>
  <button type="reset" class="btn btn-primary" name="reset">Desfazer</button>
</form>
    </main>
    <footer>
        <div class="foot">
            <h2>Contato</h2>
            <p>Endereço de Email: daniel.tica@aluno.riogrande.ifrs.edu.br</p>
        </div>
        <div class="foot">
            <h2>Privacidade</h2>
            <p>Qualquer informação fornecida para o site não irá ser compartilhado para terceiros.</p>
        </div>
        <div class="foot">
            <h2>Termos de Serviço</h2>
            <p>Material publicado no site deve estar livre de qualquer vírus, não conter conteúdo inapropriado, ou criminoso.</p>
        </div>
        <div class="foot">
            <h2>Reportar Bugs</h2>
            <p>Se possível, informe sobre algum bug encontrado no site para o email disponibilizado.</p>
        </div>
</footer>
</body>
</html>