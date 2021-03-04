<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "cd2tec";
    $link = new mysqli($host,$user,$pass,$db);

    $cep = $_POST['cep'];
    $busca = mysqli_query($link,"SELECT * FROM enderecos WHERE cep like '%$cep%'");

    $encontrado = true;

    if(mysqli_num_rows($busca)>0){
        while($endereco = mysqli_fetch_array($busca)){
            $rua = $endereco['rua'];
            $bairro = $endereco['bairro'];
            $cidade = $endereco['cidade'];
            $uf = $endereco['uf'];
            $ibge = $endereco['ibge'];
        }
    } else{
        $endereco = 'https://viacep.com.br/ws/'.$cep.'/xml';
        $xml = simplexml_load_file($endereco) or die("cant load xml");

        if(isset($xml->erro)){
            $encontrado = false;
        } else {
            $rua = strval($xml->logradouro);
            $bairro = strval($xml->bairro);
            $cidade = strval($xml->localidade);
            $uf = strval($xml->uf);
            $ibge = strval($xml->ibge);

            mysqli_query($link,"INSERT INTO enderecos(cep,rua,bairro,cidade,uf,ibge) VALUES ('$cep','$rua','$bairro','$cidade','$uf','$ibge')");
        }

        /*$endereco = json_decode(file_get_contents('https://viacep.com.br/ws/'.$cep.'/json'));

        if (array_key_exists("erro", $endereco)) {
            $encontrado = false;
        } else {
            $rua = $endereco->logradouro;
            $bairro = $endereco->bairro;
            $cidade = $endereco->localidade;
            $uf = $endereco->uf;
            $ibge = $endereco->ibge;
            mysqli_query($link,"INSERT INTO enderecos(cep,rua,bairro,cidade,uf,ibge) VALUES ('$cep','$rua','$bairro','$cidade','$uf','$ibge')");
        }*/
    }
?>
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

    <title>Resultado Busca</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

  </head>
  <body>
    <div class="container-sm">
        <div class="card border">
            <?php if($encontrado==true) { ?>
            <div class="card-header">
                <h1>Endereço Encontrado<i class="material-icons md-36 green">add_location_alt</i></h1>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-striped table-ordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>CEP</th>
                                <th>Rua</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>IBGE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $cep ?></td>
                                <td><?php echo $rua ?></td>
                                <td><?php echo $bairro ?></td>
                                <td><?php echo $cidade ?></td>
                                <td><?php echo $uf ?></td>
                                <td><?php echo $ibge ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <textarea class="form-control" name="endereco" id="endereco" rows="1"><?php if($rua!=""){ echo $rua.", ";} if($bairro!=""){ echo $bairro." - ";} if($cidade!=""){ echo $cidade." - ";} if($uf!=""){ echo $uf." - ";} echo $cep ?></textarea>
                    <button id="copy" class="badge bg-info text-dark" onClick="copiarTexto()">Copiar Endereço</button>
                </div>
                <br/>
            <a href="index.php" type="button" id="botao-consulta" class="btn btn-primary">Nova Consulta</a>
            </div>
            <?php } else { ?>
            <div class="card-header">
                <h1>Endereço Não Encontrado<i class="material-icons md-36 red">wrong_location</i></h1>
            </div>
            <div class="card-body">
                <h5>CEP Informado: <?php echo $cep; ?></h5>
                <p class="card-text"><small class="text-muted">Verifique e Tente Novamente.</small></p>
                <a href="index.php" type="button" id="botao-consulta" class="btn btn-primary">Nova Consulta</a>
            </div>
            <?php } ?>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>