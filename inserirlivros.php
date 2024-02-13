<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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







    <form method="POST" action="inserir.php" enctype="multipart/form-data" >
        Nome do Livro: <input type="text" name="nomedolivro"><br/>
        Descricao: <input type="text" name="descricao"/><br/>
        Autor: <input type="text" name="autor"/><br/>
        Imagem: <input type="file" name="imagem" /><br/>
        <label for="pais">Selecione o tipo de livro:</label>
        <select name="tipolivro" id="tipolivro">
            <option value="">Selecione...</option>
            <option value="comprar">Comprar livro</option>
            <option value="meu">Meu</option>
            <option value="alugado">Alugado</option>
            <option value="emprestado">Emprestado</option>
        </select>
        <br/>
        <button type="submit">Enviar Livro</button>
    </form>
</body>
</html>