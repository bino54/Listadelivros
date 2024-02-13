<?php 

include("config.php");

if($conn->connect_error){
    die("Falha na conexão: " . $connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["resumo"]) && !empty($_POST["mensagem"])){
    $resumo = $_POST["resumo"];
    $id = $_POST["mensagem"];

    $sql = "UPDATE tabelaproduto SET resumo=\"$resumo\" WHERE id=$id;";

    if($conn->query($sql) === TRUE){
        print "Foi alterado na base de dados";
    } else{
        print "Erro ao salvar o número: " . $conn->error;
    }
}else{
    print "O campo do número está vazio.";
}

$conn->close();

header("Location: index.php");
exit;









?>