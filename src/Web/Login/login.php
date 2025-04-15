<?php

function validarEmail(string $email): bool {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        throw new InvalidArgumentException("E-mail inválido.");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['username'] ?? '';
    $senha = $_POST['password'] ?? '';
    
    try {
        if (validarEmail($email)) {
            // Aqui você poderia validar o login com banco de dados
            $mensagem = "Login efetuado com sucesso!";
            $classe = "sucesso";
        }
    } catch (InvalidArgumentException $e) {
        $mensagem = $e->getMessage();
        $classe = "erro";
    }
}
?>
