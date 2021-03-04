<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Buscar Endereço</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

  </head>
  <body>
    <div class="container-sm">
        <div class="card border">
            <div class="card-header">
                <h1>Buscar Endereço <i class="material-icons md-36 green">not_listed_location</i></h1>
            </div>
            <div class="card-body">
                <p class="card-text"><small class="text-muted">Informe o CEP (apenas os 8 números) e o botão de buscar será habilitado.</small></p>
                <div class="form-group">
                    <form class="form-inline my-2 my-lg-0" method="post" action="resultado.php">
                        <label class="form-label">CEP:
                        <input class="form-control" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                            onblur="validacep(this.value);" /></label> <button type="submit" id="botao-buscar" class="btn btn-outline-success my-2 my-sm-0" disabled>Buscar</button><br />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>