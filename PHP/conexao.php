<?php
// Função para criar a conexão com o banco de dados SQLite e garantir que a tabela exista
function conectarBanco() {
    try {
        // Caminho relativo para o banco de dados SQLite
        $conn = new PDO("sqlite:" . __DIR__ . "/meu_banco.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Criação da tabela se não existir
        $sql = "CREATE TABLE IF NOT EXISTS Inscrito (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT NOT NULL,
            telefone TEXT NOT NULL,
            data_nascimento TEXT NOT NULL,
            genero TEXT NOT NULL,
            mensagem TEXT NOT NULL
        )";

        // Executa o comando para criar a tabela
        $conn->exec($sql);

        return $conn;
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        return null;
    }
}
?>
