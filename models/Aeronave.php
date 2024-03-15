<?php

class Aeronave {

    private int $id;
    private string $modelo;
    private int $tamanho;
    private Capacidade $capacidade;
    private string $status;
    private Pista $pista;
    private float $combustivel;
    private float $peso;
    private int $passageiros;


    public function __construct(int $id, string $modelo)
    {
        $this->id = $id;
        $this->modelo = $modelo;
        $this->status = 'INATIVO';

        $this->combustivel = 0;
        $this->peso = 0;
        $this->passageiros = 0;
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

    public function adicionarPeso(int $peso) {
        $this->peso+=$peso;
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

    public function getCombustivel(): float {
        return $this->combustivel;
    }

    public function getPeso(): float {
        return $this->peso;
    }

    public function getPassageiros(): int {
        return $this->passageiros;
    }


}