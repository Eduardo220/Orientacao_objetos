<?php
require __DIR__ . '/vendor/autoload.php';

use Eduar\OrientacaoObjetos\ContasTipo\ContaPoupanca;

if (class_exists('Eduar\OrientacaoObjetos\ContasTipo\ContaPoupanca')) {
    echo "Classe encontrada!";
} else {
    echo "Classe NÃO encontrada!";
}
