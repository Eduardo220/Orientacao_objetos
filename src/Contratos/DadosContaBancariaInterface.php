<?php 
declare(strict_types=1); // Habilitando o modo estrito para garantir que os tipos sejam respeitados
namespace Eduar\OrientacaoObjetos\Contratos; // Definindo o namespace Banco\Contratos

interface DadosContaBancariaInterface
{
    public function getBanco(): string; // Método para obter o nome do banco
    public function getAgencia(): string; // Método para obter o número da agência
    public function getConta(): string; // Método para obter o número da conta
    public function getTitular(): string; // Método para obter o nome do titular
}
?>