<?php

require __DIR__ . '/../vendor/autoload.php'; // Incluindo o autoload do Composer, se necessário

use Eduar\OrientacaoObjetos\ContasTipo\ContaCorrente; // Importando a classe ContaCorrente
use Eduar\OrientacaoObjetos\Contratos\DadosContaBancariaInterface; // Importando a interface DadosContaBancariaInterface do namespace Banco\Contratos
use Eduar\OrientacaoObjetos\Contratos\OperacoesContaBancariaInterface; // Importando a interface OperacoesContaBancariaInterface do namespace Banco\Contratos

function exibirDados(DadosContaBancariaInterface $contaBancaria): void
{
    // Exibindo os dados da conta bancária
    echo "Banco: " . $contaBancaria->getBanco() . PHP_EOL;
    echo "Agência: " . $contaBancaria->getAgencia() . PHP_EOL;
    echo "Conta: " . $contaBancaria->getConta() . PHP_EOL;
    echo "Titular: " . $contaBancaria->getTitular() . PHP_EOL;
    echo "_______________________________" . PHP_EOL;
}

function executarOperacoes(OperacoesContaBancariaInterface $contaBancaria): void
{
    // Executando operações na conta bancária
    echo $contaBancaria->obterSaldo(); // Exibindo o saldo atual da conta
    echo PHP_EOL; // Adicionando uma quebra de linha

    echo $contaBancaria->depositar(50); // Depositando R$ 50,00 na conta
    echo PHP_EOL;

    echo $contaBancaria->obterSaldo(); // Exibindo o saldo atual da conta após o depósito
    echo PHP_EOL;

    echo $contaBancaria->sacar(30); // Sacando R$ 30,00 da conta
    echo PHP_EOL;

    echo $contaBancaria->obterSaldo(); // Exibindo o saldo atual da conta após o saque
    echo PHP_EOL;
}


$contaBancaria = new ContaCorrente
(
    'Banco do Brasil', // Nome do banco
    '1234', // Número da agência
    '123456-7', // Número da conta
    'João da Silva', // Nome do titular
    0.0 // Saldo inicial
);

exibirDados($contaBancaria); // Exibindo os dados da conta bancária
executarOperacoes($contaBancaria); // Executando operações na conta bancária
 



