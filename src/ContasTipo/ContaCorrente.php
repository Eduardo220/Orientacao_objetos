<?php 
declare(strict_types=1); // Habilitando o modo estrito para garantir que os tipos sejam respeitados

namespace Eduar\OrientacaoObjetos\ContasTipo; // Definindo o namespace Banco\ContasTipo

use Eduar\OrientacaoObjetos\ContaBancaria; // Importando a classe ContaBancaria do namespace Banco

class ContaCorrente extends ContaBancaria
{
    const TAXA_SAQUE = 0.10; // Definindo uma constante para a taxa de saque
    const LIMITE_SAQUE = 1000.00; // Definindo uma constante para o limite de saque
    const TIPO_CONTA = 'Conta Corrente'; // Definindo uma constante para o tipo de conta

    public function __construct(
        string $banco,
        string $agencia,
        string $conta,
        string $titular,
        float $saldo = 0.00 // Inicializando o saldo com 0.0 por padrão
    ) {
        parent::__construct($banco, $agencia, $conta, self::TIPO_CONTA, $titular, $saldo); // Chamando o construtor da classe pai
    }

    public function obterSaldo(): string
    {
        // Método para obter o saldo atual da conta corrente
        return "Saldo atual da conta corrente: R$ " . number_format($this->saldo - self::TAXA_SAQUE, 2, ',' , '.');
    }
}   
?>