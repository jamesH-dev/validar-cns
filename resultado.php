<?php
    require_once('valida-cns.php');

    // Utilização da condição ternária para validar se há na global POST a variável 'cns' e evitar uma Warning para o usuário final.
    $cns = isset($_POST['cns']) ? $_POST['cns'] : $_POST['cns'] = NULL;

    $resultado = valida_cns($cns);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Resultado Validação PHP</title>
  </head>
  <body>
    <div class="main">
        <div class="container-fluid">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="card ">
                    <div class="card-header">
                        <h3>Resultado</h3>
                    </div>
                    <div class="card-body">
                        <h6>O CNS digitado <?= $cns ?> é:</h6>
                        <div class="border d-flex justify-content-center p-3 <?= ($resultado ? 'bg-success' : 'bg-danger') ?>">
                            <h6 class="align-middle text-white"><?= ($resultado ? 'VÁLIDO!' : 'INVÁLIDO!') ?></h6>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="index.html">
                                <div class="btn btn-primary mt-3"> <i class="fa fa-home" aria-hidden="true"></i> Início</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets\vendors\fontawesome\all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>