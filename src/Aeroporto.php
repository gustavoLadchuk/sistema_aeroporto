<?php

namespace Gustafl\Aeroporto;

class Aeroporto
{

    private string $nome;
    private Local $local;
    private array $aeronaves;
    private array $pistas;
    private array $galpoes;
    private array $voos;

    public function __construct(String $nome, Local $local)
    {
        $this->nome = $nome;
        $this->local = $local;
        $this->aeronaves = [];
        $this->pistas = [];
        $this->galpoes = [];
        $this->voos = [];
    }


    public function addAeronave(Aeronave $aeronave): void
    {
        array_push($this->aeronaves, $aeronave);
    }

    public function removeAeronave(Aeronave $aeronave): void
    {
        array_splice($this->aeronaves, array_search($aeronave, $this->aeronaves), 1);
    }

    public function addPista(Pista $pista): void
    {
        array_push($this->pistas, $pista);
    }

    public function addgalpao(Galpao $galpao): void
    {
        array_push($this->galpoes, $galpao);
    }

    public function addVoo(Voo $voo): void
    {
        array_push($this->voos, $voo);
    }

    public function levarParaGalpao(Aeronave $aeronave, Galpao $galpao): string
    {
        if (
            $aeronave->getQuantidadePassageirosEmbarcados() == 0 &&
            $galpao->getCapacidadeAeronaves() >= $aeronave->getTamanho()->value
        ) {
            $aeronave->setGalpao($galpao);
            $aeronave->editarStatus(Status::INDISPONIVEL);
            return 'A aeronave foi para o galpão';
        }
        return 'A aeronave não pode ir para o galpão';
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

    public function getPistas(): array
    {
        return $this->pistas;
    }

    public function getGalpoes(): array
    {
        return $this->galpoes;
    }

    public function getAeronaves(): array
    {
        return $this->aeronaves;
    }
}
