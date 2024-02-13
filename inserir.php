<?php
if($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];

    if($imagem['error'] == 0) {
        $diretorio_destino = 'imagens/';
        $tipo_permitido = array('jpg', 'jpeg', 'png');
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

        if(in_array(strtolower($extensao), $tipo_permitido)) {
            // Gera um nome único para o arquivo
            $nome_arquivo = uniqid('imagem_') . '.' . $extensao;
            $caminho_destino = $diretorio_destino . $nome_arquivo;

            // Move o arquivo para o diretório de destino
            if(move_uploaded_file($imagem['tmp_name'], $caminho_destino)) {
                echo "Upload realizado com sucesso!";
                $nomedolivro = $_POST['nomedolivro'];
                $descricao = $_POST['descricao'];
                $tipolivro = $_POST['tipolivro'];
                $autor = $_POST['autor'];
                print "<br/>";
                print "O livro chama-se $nomedolivro e a sua descricao é $descricao";
                // Colocar na base de dados
                $host = "localhost:4306";
                $usuario = "root";
                $senha = "";
                $banco = "livros";

                // Conecta ao banco de dados
                $conn = new mysqli($host, $usuario, $senha, $banco);
                if ($conn->connect_error) {
                    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
                }
                $sql = "INSERT INTO tabelaproduto (nome_do_livro,descricao,autor,imagem,tipodelivro) VALUES ('$nomedolivro','$descricao','$autor','$caminho_destino','$tipolivro')";
                
                print "<br/>";
                if($conn->query($sql) === TRUE){
                    print "Dados salvos com sucesso!";
                } else{
                    print "Erro ao salvar os dados: " . $conn->error;
                }

                $conn->close();
                
                // Redireciona para outra página após o upload
                header('Location: index.php');
                exit(); // Certifique-se de que o script seja encerrado após o redirecionamento
            } else {
                echo "Falha ao mover o arquivo para o destino.";
            }
        } else {
            echo "Tipo de arquivo não permitido!";
        }
    } else {
        echo "Erro durante o upload: " . $imagem['error'];
    }

}

