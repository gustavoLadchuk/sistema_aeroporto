<?php

class Capacidade {

    private int $passageiros;
    private int $combustivel;
    private int $pesoMaximo;

    public function __construct(int $passageiros, int $combustivel, int $pesoMaximo) {
        $this->passageiros = $passageiros;
        $this->combustivel = $combustivel;
        $this->pesoMaximo = $pesoMaximo;
    }

    public function getPassageiros() : int {
        return $this->passageiros;
    }

    public function getCombustivel() : int {
        return $this->combustivel;
    }

    public function getPesoMaximo() : int {
        return $this->pesoMaximo;
    }
}