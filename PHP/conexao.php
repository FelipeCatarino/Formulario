<?php
// Criação da conexão com o banco de dados SQLite
// Arquivo conexao.php
function conectarBanco() {
    try {
        // Caminho relativo para o banco de dados SQLite
        $conn = new PDO("sqlite:" . __DIR__ . "/meu_banco.db");  // __DIR__ vai pegar o diretório atual (php/)
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        return null;
    }
}

?>
