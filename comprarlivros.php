<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>

<?php 
        include("config.php");

        include("classeservico.php");


        $sql = "SELECT * FROM tabelaproduto WHERE tipodelivro=\"comprar\"";

        $res = $conn->query($sql);

        $qtd = $res->num_rows;

        $array = [];
        $produto;

        while($row=$res->fetch_object()){
            $produto = new Servico($row->id,$row->nome_do_livro,$row->descricao,$row->resumo,$row->autor,$row->imagem,$row->tipodelivro);
            array_push($array,$produto);
        }

        $json_array = json_encode($array);
    
    ?>

    <script>
        var array_js = <?php echo $json_array; ?>;
    </script>


    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyBooks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="inserirlivros.php">Inserir livros</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="comprarlivros.php">Lista de livros a comprar</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
<!--             <form class="d-flex" role="search"> -->
            <nav class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="inputsearch"/>
                <button class="btn btn-outline-success" type="submit" onclick="botaoclicado(array_js)" id="buttonsearch">Search</button>
            </nav>
            <!-- </form> -->
            </div>
        </div>
    </nav>


    <div id="dtPedidos">
        <table class="table caption-top">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome do livro</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Tipo de livro</th>
                    <th scope="col">Preco</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="teste">
                <?php 
                    foreach($array as $a){
                        print "<tr>";
                        print "<th scope='row'>$a->id</th>";
                        print "<td><img src='$a->imagem' width='200' heigth='200' /></td>";
                        print "<td>$a->nomedolivro</td>";
                        print "<td>$a->autor</td>";
                        print "<td>$a->descricao</td>";
                        print "<td>$a->tipolivro</td>";
                        print "<td>24,90 em promocao(20%) 19,90</td>";
                        print "<td><button  class=\"btn btn-success\" type=\"submit\">Resumo</button><button  class=\"btn btn-danger\" type=\"submit\">Apagar</button><button  class=\"btn btn-warning\" type=\"submit\">Alterar</button></td>";
                        print "</tr>";
                    }
                ?>

            </tbody>
        </table>
    </div>

























</body>
</html>









