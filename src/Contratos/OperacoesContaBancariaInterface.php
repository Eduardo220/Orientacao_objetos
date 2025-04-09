<?php 
declare(strict_types=1); // Habilitando o modo estrito para garantir que os tipos sejam respeitados
namespace Eduar\OrientacaoObjetos\Contratos; // Definindo o namespace Banco\Contratos

interface OperacoesContaBancariaInterface // Interface para definir as operações de uma conta bancária
{
    public function depositar(float $valor): string; // Método para depositar um valor na conta
    public function sacar(float $valor): string; // Método para sacar um valor da conta
    public function obterSaldo(): string; // Método para obter o saldo atual da conta
}
?>