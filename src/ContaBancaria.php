<?php 
declare(strict_types=1); // Habilitando o modo estrito para garantir que os tipos sejam respeitados

// require __DIR__ . '/../vendor/autoload.php'; // Incluindo o autoload do Composer, se necessário
namespace Eduar\OrientacaoObjetos; // Definindo o namespace Banco

use Eduar\OrientacaoObjetos\Contratos\OperacoesContaBancariaInterface; // Importando a interface OperacoesContaBancariaInterface do namespace Banco\Contratos
use Eduar\OrientacaoObjetos\Contratos\DadosContaBancariaInterface; // Importando a interface DadosContaBancariaInterface do namespace Banco\Contratos

abstract class ContaBancaria implements DadosContaBancariaInterface, OperacoesContaBancariaInterface // Classe abstrata ContaBancaria que implementa as interfaces de operações e dados da conta
//
{ 
    protected string $banco;
    protected string $agencia;
    protected string $conta;
    protected string $tipo;
    protected string $titular;
    protected float $saldo;

    public function __construct
    (    // Construtor da classe ContaBancaria
        string $banco,
        string $agencia,
        string $conta,
        string $tipo,
        string $titular,
        float $saldo
    ) {
            $this->banco = $banco; // Inicializando a propriedade $banco com o valor passado como argumento
            $this->agencia = $agencia; 
            $this->conta = $conta; 
            $this->tipo = $tipo; 
            $this->titular = $titular; 
            $this->saldo = $saldo; 
    }

    public function depositar(float $valor): string{
        if ($valor > 0) { // Verifica se o valor é positivo
            $this->saldo += $valor; // Adiciona o valor ao saldo
            return "Depósito de R$ " . number_format($valor, 2, ',' , '.') . " realizado com sucesso. Saldo atual: R$ {$this->saldo}"; // Retorna uma mensagem de sucesso com o saldo atualizado
        } else {
            throw new \InvalidArgumentException("Valor de depósito deve ser positivo."); // Lança uma exceção se o valor for inválido
        } 
    }

    public function sacar(float $valor): string{
        if ($valor > 0 && $valor <= $this->saldo) { // Verifica se o valor é positivo e menor ou igual ao saldo
            $this->saldo -= $valor; // Subtrai o valor do saldo
            return "Saque de R$ " . number_format($valor, 2, ',' , '.') . " realizado com sucesso. Saldo atual: R$ " . $this->saldo; // Retorna uma mensagem de sucesso com o saldo atualizado
        } else {
            throw new \InvalidArgumentException("Valor de saque inválido."); // Lança uma exceção se o valor for inválido
        }	
    }

    // Método abstrato para obter o saldo, deve ser implementado nas classes filhas
    // Duvida: o que é um método abstrato?
    // Resposta: Um método abstrato é um método que não possui implementação na classe pai e deve ser implementado nas classes filhas. Ele serve como um contrato para garantir que as classes filhas forneçam uma implementação específica para esse método.
    // O método abstrato não pode ser instanciado diretamente, apenas as classes que herdam a classe abstrata podem implementá-lo.
    // Isso permite que as classes filhas tenham comportamentos diferentes para o mesmo método, dependendo de suas necessidades específicas.
    // Isso é útil em cenários onde você deseja garantir que todas as subclasses implementem um método específico, mas a implementação pode variar de acordo com a lógica de cada subclasse.
    public abstract function obterSaldo(): string;
        // Método para obter o saldo atual da conta

    public function getBanco(): string {
        // Método para obter o valor da propriedade $banco
        return $this->banco;
    }
    public function getAgencia(): string {
        // Método para obter o valor da propriedade $agencia
        return $this->agencia;
    }
    public function getConta(): string {
        // Método para obter o valor da propriedade $conta
        return $this->conta;
    }
    public function getTipo(): string {
        // Método para obter o valor da propriedade $tipo
        return $this->tipo;
    }
    public function getTitular(): string {
        // Método para obter o valor da propriedade $titular
        return $this->titular;
    }
    public function getSaldo(): float {
        // Método para obter o valor da propriedade $saldo
        return $this->saldo;
    }
}

?>