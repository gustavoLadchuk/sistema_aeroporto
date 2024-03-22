<?php

class Aeronave {

    private int $id;
    private string $modelo;
    private int $tamanho;
    private Capacidade $capacidade;
    private string $status;
    private Pista $pista;
    private float $combustivelRestante;
    private float $pesoDeCarga;
    private int $passageirosEmbarcados;


    public function __construct(int $id, string $modelo)
    {
        $this->id = $id;
        $this->modelo = $modelo;
        $this->status = 'INATIVO';

        $this->combustivelRestante = 0;
        $this->pesoDeCarga = 0;
        $this->passageirosEmbarcados = 0;
    }

    public function setTamanho(int $tamanho) : void {
        if ($tamanho >= 1 && $tamanho <= 3){
           $this->tamanho = $tamanho;
        }else{
            echo 'Valor inválido, use uma dessas opções: (1) PEQUENO, (2) MEDIO, (3) GRANDE';
        }
    }

    public function setPista(Pista $pista) : void
    {
        if ($this->status == 'DISPONIVEL'){

            if ($pista->getTamanho() >= $this->tamanho){
                $this->pista = $pista;
            }else{
                echo "Essa aeronave é pequena demais para essa pista";
            }
            
        }else{
            echo 'Esse avião não está disponível para ser utilizado';
        }

    }

    public function adicionarPesoDeCarga(int $peso) {
        $this->pesoDeCarga+=$peso;
    }

    public function editarStatus(string $status) : void {

        if (
            $status == 'MANUTENÇÃO' || 
            $status == 'LIVRE' ||
            $status == 'INATIVO'  
            ){
                $this->status = $status;
            }
    }

    //TODO adicionar verificação de se o passageiro pode embarcar no voo
    public function embarcar(Passageiro $passageiro): void
    {
        if ($passageiro->getStatus() == 'CHECK IN')
        {
            $passageiro->embarcar();
            $this->passageirosEmbarcados++;
            $this->adicionarPesoDeCarga($passageiro->getPeso());
        }else{
            echo 'O passageiro não pode embarcar';
        }

    }

    public function desembarcar(Passageiro $passageiro): void
    {
        if ($passageiro->getStatus() == 'EMBARCADO')
        {
            $passageiro->desembarcar();
            $this->passageirosEmbarcados--;
        }else{
            echo 'O passageiro não pode desembarcar';
        }

    }


    public function getId(): int {
        return $this->id;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function getCapacidade(): Capacidade {
        return $this->capacidade;
    }

    public function getStatus(): string {
        return $this->status ?? 'Inválido';
    }

    public function getPista(): Pista {
        return $this->pista;
    }

    public function getCombustivelRestante(): float {
        return $this->combustivelRestante;
    }

    public function getPesoDeCarga(): float {
        return $this->pesoDeCarga;
    }

    public function getPassageirosEmbarcados(): int {
        return $this->passageirosEmbarcados;
    }


}