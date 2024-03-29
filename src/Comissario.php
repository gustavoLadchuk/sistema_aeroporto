<?php

namespace Gustafl\Aeroporto;

class Comissario extends Pessoa{
    private array $idiomas;
    private bool $treinamentoEmergencia;
    private int $anosDeExperiencia;

    public function __construct(
        string $nome, 
        string $email, 
        int $salario, 
        string $alcunha,
        bool $treinamentoEmergencia, 
        int $anosDeExperiencia
    )
    {
        parent::__construct($nome,$email, $salario, $alcunha);
        $this->idiomas = [];
        $this->treinamentoEmergencia = $treinamentoEmergencia;
        $this->anosDeExperiencia = $anosDeExperiencia;
    }

    public function getIdiomas(): array
    {
        return $this->idiomas;
    }

    public function getTreinamentoEmergencia(): bool
    {
        return $this->treinamentoEmergencia;
    }

    public function getAnosDeExperiencia(): int
    {
        return $this->anosDeExperiencia;
    }

    public function addIdioma(string $idioma): void
    {
        array_push($this->idiomas, $idioma);
    }

    public function setTreinamentoEmergencia(bool $treinamentoEmergencia): void
    {
        $this->treinamentoEmergencia = $treinamentoEmergencia;
    }

    public function setAnosDeExperiencia(int $anosDeExperiencia): void
    {
        $this->anosDeExperiencia = $anosDeExperiencia;
    }
}