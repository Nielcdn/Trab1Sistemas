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
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <header>
            <div class="logo"><a href="./menu.html"><img src="../img/logo.jpeg" alt="Logo do Site"></a></div>
            <div class="banner"><h3><i>Expressar-se é a melhor forma de mudar o mundo!!</i></h3></div>
    </header>
    <nav>
            <div class="menu"><a href="./menu.html">Menu Principal</a></div>
            <div class="menu"><a href="./literatura.html">Literatura</a></div>
            <div class="menu"><a href="./galeria.html">Galeria</a></div>
            <div class="menu"><a href="./musica.html">Músicas</a></div>
            <div class="menu"><a href="./autor.html">Autores</a></div>
            <div class="menu"><a href="./publicar.html">Publique sua Arte</a></div>
            <div class="menu"><a href="./videos.html">Vídeos sobre Arte</a></div>
            <div class="menu"><a href="./galfixa.html">Galeria Fixa</a></div>
            <div class="menu"><a href="./animacao.html">Animação</a></div>
    </nav>
    <main>
    <form action="formRecebeLogin" method="post">
  <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="emailInputLabel">Email:</label>
      <input type="text" class="form-control" id="emailInputLabel" name = "email">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="senhaInputLabel">Senha:</label>
      <input type="password" class="form-control" id="senhaInputLabel" name="senha">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
<?php  if (session()->get('erro')){
    echo "<i>". session()->getFlashdata('erro') . "</i>";
}
?>
</form>
    </main>
    <footer>
        <div class="foot">
            <h2>Contato</h2>
            <p>Endereço de Email: daniel.tica@aluno.riogrande.ifrs.edu.br</p>
        </div>
        <div class="foot">
            <h2>Privacidade</h2>
            <p>Qualquer informação fornecida para o site não irá, e não pode, ser compartilhado para terceiros.</p>
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