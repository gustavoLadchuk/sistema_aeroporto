<?php

namespace Gustafl\Aeroporto;

class Aeroporto
{

    private string $nome;
    private Local $local;
    private array $aeronaves;
    private array $pistas;
    private array $voos;

    public function __construct(String $nome, Local $local)
    {
        $this->nome = $nome;
        $this->local = $local;
        $this->aeronaves = [];
        $this->pistas = [];
        $this->voos = [];
    }


    public function addAeronave(Aeronave $aeronave): void
    {
        array_push($this->aeronaves, $aeronave);
    }

    public function addPista(Pista $pista): void
    {
        array_push($this->pistas, $pista);
    }

    public function addVoo(Voo $voo): void
    {
        array_push($this->voos, $voo);
    }

    public function setCoordenadas(float $latitude, float $longitude)
    {
        $this->local->setLatitude($latitude);
        $this->local->setLongitude($longitude);
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function getLocalizacao(): Local
    {
        return $this->local;
    }
    public function localizacaoToString(): string
    {
        $localizacao = 
        $this->local->getCidade() . ', ' . 
        $this->local->getEstado() . ', ' . 
        $this->local->getPais();

        return $localizacao;
    }

    public function getPistas() : array
    {
        return $this->pistas;
    }

    public function getAeronaves() : array
    {
        return $this->aeronaves;
    }
}
