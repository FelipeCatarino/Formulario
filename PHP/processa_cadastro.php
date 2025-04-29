<?php
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data-nascimento'];
    $genero = $_POST['genero'];
    $mensagem = $_POST['mensagem'];

    // Validação dos dados
    if (empty($nome) || empty($email) || empty($telefone) || empty($data_nascimento) || empty($genero) || empty($mensagem)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        $conn = conectarBanco();

        if ($conn) {
            $sql = "INSERT INTO Inscrito (nome, email, telefone, data_nascimento, genero, mensagem)
                    VALUES (:nome, :email, :telefone, :data_nascimento, :genero, :mensagem)";

            $stmt = $conn->prepare($sql);

            // Bind os parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':mensagem', $mensagem);

            // Executa o comando
            if ($stmt->execute()) {
                echo "Dados enviados com sucesso!";
            } else {
                echo "Erro ao salvar os dados.";
            }
        }
    }
}
?>
