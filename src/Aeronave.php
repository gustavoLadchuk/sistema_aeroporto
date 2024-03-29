<?php

namespace Gustafl\Aeroporto;

class Aeronave
{

    private string $modelo;
    private Tamanho $tamanho;
    private Capacidade $capacidade;
    private Status $status;
    private Pista $pista;
    private float $combustivelRestante;
    private float $pesoDeCarga;
    private int $passageirosEmbarcados;


    public function __construct(string $modelo, Tamanho $tamanho)
    {
        $this->modelo = $modelo;
        $this->tamanho = $tamanho;
        $this->status = Status::INATIVO;

        $this->combustivelRestante = 0;
        $this->pesoDeCarga = 0;
        $this->passageirosEmbarcados = 0;
    }

    public function setPista(Pista $pista): void
    {
        if ($this->status == Status::DISPONIVEL) {

            if ($pista->getTamanho() == $this->tamanho) {
                $this->pista = $pista;
            } else {
                echo "Essa aeronave não pode ser utilizada nessa pista";
            }
        } else {
            echo 'Esse avião não está disponível para ser utilizado';
        }
    }

    public function adicionarPesoDeCarga(float $peso)
    {
        $this->pesoDeCarga += $peso;
    }

    public function editarStatus(Status $status): void
    {
        $this->status = $status;
    }


    public function embarcar(Passageiro $passageiro): void
    {
        if ($passageiro->getStatus() == Status::CHECKIN) {
            $passageiro->embarcar();
            $this->passageirosEmbarcados++;
            $this->adicionarPesoDeCarga($passageiro->getPeso());
        } else {
            echo 'O passageiro não pode embarcar';
        }
    }

    public function desembarcar(Passageiro $passageiro): void
    {
        if ($passageiro->getStatus() == Status::EMBARCADO) {
            $passageiro->desembarcar();
            $this->passageirosEmbarcados--;
        } else {
            echo 'O passageiro não pode desembarcar';
        }
    }


    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getCapacidade(): Capacidade
    {
        return $this->capacidade;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getPista(): Pista
    {
        return $this->pista;
    }

    public function getCombustivelRestante(): float
    {
        return $this->combustivelRestante;
    }

    public function getPesoDeCarga(): float
    {
        return $this->pesoDeCarga;
    }

    public function getPassageirosEmbarcados(): int
    {
        return $this->passageirosEmbarcados;
    }
}
