<?php
// Inclui o arquivo de conexão
include_once 'conexao.php';

function criarTabela() {
    // Conexão com o banco
    $conn = conectarBanco();

    if ($conn) {
        // SQL para criar a tabela
        $sql = "CREATE TABLE IF NOT EXISTS Inscrito (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT NOT NULL,
            telefone TEXT NOT NULL,
            data_nascimento TEXT NOT NULL,
            genero TEXT NOT NULL,
            mensagem TEXT NOT NULL
        )";

        // Executando o comando SQL
        try {
            $conn->exec($sql);
            echo "Tabela 'Inscrito' criada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao criar a tabela: " . $e->getMessage();
        }
    }
}

// Chama a função para criar a tabela
criarTabela();
?>
