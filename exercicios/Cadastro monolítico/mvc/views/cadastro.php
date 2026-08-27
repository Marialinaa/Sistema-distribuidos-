<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro MVC</title>
    <script>
        function validarFormulario() {
            const nome = document.getElementById('nome').value;
            if (nome.length < 3) {
                alert('O nome deve ter pelo menos 3 caracteres.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Cadastro de Usuário</h2>

    <?php if (!empty($mensagem)): ?>
        <p><strong><?= htmlspecialchars($mensagem) ?></strong></p>
    <?php endif; ?>

    <form method="POST" action="" onsubmit="return validarFormulario();">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <button type="submit">Salvar</button>
    </form>

    <hr>

    <h3>Usuários Cadastrados</h3>
    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li><?= htmlspecialchars($usuario['nome']) ?> - <?= htmlspecialchars($usuario['email']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>