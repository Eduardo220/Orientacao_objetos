<?php

function validarEmail(string $email): bool {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        throw new InvalidArgumentException("E-mail inválido.");
    }
}


