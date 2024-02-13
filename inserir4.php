<?php 


/*
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])) {
    $uploadDir = "imagens/"; // Diretório onde as imagens serão armazenadas




// Verifica se houve algum erro durante o upload
if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
    // Move o arquivo para o diretório de uploads
    $tempName = $_FILES["imagem"]["tmp_name"];
    $newName = $uploadDir . basename($_FILES["imagem"]["name"]);
    move_uploaded_file($tempName, $newName);

    // Exibe a imagem na tela
    echo "<h2>Imagem enviada com sucesso!</h2>";
    echo "<img src='$newName' alt='Imagem Enviada'>";
} else {
    echo "<h2>Ocorreu um erro durante o upload da imagem.</h2>";
}
} else {
// Se o formulário não foi enviado corretamente
echo "<h2>Por favor, envie uma imagem.</h2>";
}


print "<br/>";
if ($_POST['nomedolivro'] && $_POST['descricao']){
    print "O nome do livro é " . $_POST['nomedolivro'];
    print "A sua descrição é" . $_POST['descricao'];
}
*/

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])) {
    // Configurações de conexão com o banco de dados (substitua com as suas)
    $host = "localhost:4306";
    $usuario = "root";
    $senha = "";
    $banco = "livros";

    // Conecta ao banco de dados
    $conexao = new mysqli($host, $usuario, $senha, $banco);
    if ($conexao->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
    }

    $uploadDir = "imagens/"; // Diretório onde as imagens serão armazenadas

    // Verifica se houve algum erro durante o upload
    if ($_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {
        $tempName = $_FILES["imagem"]["tmp_name"];
        $newName = $uploadDir . basename($_FILES["imagem"]["name"]);
        move_uploaded_file($tempName, $newName);
        
        // Lê o arquivo de imagem
        $dadosImagem = file_get_contents($newName);
        $nomeImagem = $_FILES["imagem"]["name"];
        $tipoImagem = $_FILES["imagem"]["type"];
        $tamanhoImagem = $_FILES["imagem"]["size"];

        // Prepara a query para inserir os dados no banco de dados
        $query = $conexao->prepare("INSERT INTO imagens (nome_arquivo, tipo_arquivo, tamanho_arquivo, dados_arquivo) VALUES (?, ?, ?, ?)");
        $query->bind_param("ssib", $nomeImagem, $tipoImagem, $tamanhoImagem, $dadosImagem);
        if ($query->execute()) {
            echo "<h2>Imagem enviada e armazenada no banco de dados com sucesso!</h2>";
        } else {
            echo "<h2>Ocorreu um erro ao armazenar a imagem no banco de dados.</h2>";
        }
        $query->close();
    } else {
        echo "<h2>Ocorreu um erro durante o upload da imagem.</h2>";
    }
    $conexao->close();
} else {
    // Se o formulário não foi enviado corretamente
    echo "<h2>Por favor, envie uma imagem.</h2>";
}


































