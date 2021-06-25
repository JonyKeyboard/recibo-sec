<?php
class Funcionario extends Pessoa
{
  
    private $cargo;

    public function __construct(string $nome, CPF $cpf, string $cargo)
    {
        parent::__construct($nome, $cpf);
        $this->cargo = $cargo;
    }
    public function alteraNome(string $nome): void
    {
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }
    public function recuperaCargo(): string
    {
        return $this->cargo;
    }
}