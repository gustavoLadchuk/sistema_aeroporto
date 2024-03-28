<?php

namespace Gustafl\Aeroporto;

class Aeroporto{

    private string $nome;
    private Local $local;
    private array $aeronaves;
    private array $pistas;
    private array $voos;

    public function __construct(int $nome, Local $local)
    {
        $this->nome = $nome;
        $this->local = $local;
        $this->aeronaves = [];
        $this->pistas = [];
        $this->voos = [];
    }


    public function addAeronave(Aeronave $aeronave) : void {
        array_push($this->aeronaves, $aeronave);
    }

    public function addPista(Pista $pista) : void {
        array_push($this->pistas, $pista);
    }

    public function addVoo(Voo $voo) : void {
        array_push($this->voos, $voo);
    }


    public function getNome() : string 
    {
        return $this->nome;
    }

    public function getLocalizacao() : Local 
    {
        return $this->local;
    }
   
}