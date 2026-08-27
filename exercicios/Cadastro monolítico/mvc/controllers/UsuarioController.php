<?php

require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController
{
    private $model;

    public function __construct($pdo)
    {
        $this->model = new UsuarioModel($pdo);
    }

    public function index()
    {
        $mensagem = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');

            if (empty($nome) || empty($email)) {
                $mensagem = 'Erro: Preencha todos os campos!';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensagem = 'Erro: E-mail inválido!';
            } else {
                $this->model->salvar($nome, $email);
                $mensagem = 'Usuário cadastrado com sucesso!';
            }
        }

        $usuarios = $this->model->listarTodos();

        require __DIR__ . '/../views/cadastro.php';
    }
}
