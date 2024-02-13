<?php
// Verifica se foi enviado um arquivo
if(isset($_FILES['imagem'])) {
    $imagem = $_FILES['imagem'];

    // Verifica se não houve erro durante o upload
    if($imagem['error'] == 0) {
        // Diretório de destino para salvar a imagem
        $diretorio_destino = 'imagens/';

        // Verifica o tipo do arquivo
        $tipo_permitido = array('jpg', 'jpeg', 'png');
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

        if(in_array(strtolower($extensao), $tipo_permitido)) {
            // Move o arquivo para o diretório de destino
            $caminho_destino = $diretorio_destino . $imagem['name'];
            move_uploaded_file($imagem['tmp_name'], $caminho_destino);
            echo "Upload realizado com sucesso!";
        } else {
            echo "Tipo de arquivo não permitido!";
        }
    } else {
        echo "Erro durante o upload: " . $imagem['error'];
    }
}
?>
