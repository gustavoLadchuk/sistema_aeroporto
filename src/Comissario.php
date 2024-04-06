<?php

namespace Gustafl\Aeroporto;

class Comissario extends Tripulante{
    private array $idiomas;
    private bool $treinamentoEmergencia;
    private int $anosDeExperiencia;

    public function __construct(
        string $nome, 
        Genero $genero, 
        int $cpf,
        float $peso,
        int $salario,
        bool $treinamentoEmergencia, 
        int $anosDeExperiencia
    )
    {
        parent::__construct($nome, $genero, $cpf, $peso, $salario);
        $this->idiomas = [];
        $this->treinamentoEmergencia = $treinamentoEmergencia;
        $this->anosDeExperiencia = $anosDeExperiencia;
    }

    public function getCargo() : string
    {
        return 'comissári' . $this->getSufixoGenero();
    }

    public function getIdiomas(): array
    {
        return $this->idiomas;
    }

    public function getIdiomasString() : string
    {
        $idiomas = '';

        foreach ($this->idiomas as $idioma){
            $idiomas = $idiomas . $idioma . ' ';
        }
        return $idiomas;
    }

    public function getTreinamentoEmergencia(): bool
    {
        return $this->treinamentoEmergencia;
    }

    public function getTreinamentoEmergenciaString() : string
    {
        if ($this->treinamentoEmergencia) return 'Sim';
        return 'Não';
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