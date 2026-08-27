<?php

class UsuarioModel {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function salvar(string $nome, string $email): bool {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        return $stmt->execute([':nome' => $nome, ':email' => $email]);
    }

    public function buscarTodos(): array {
        return $this->pdo->query("SELECT * FROM usuarios ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

}
