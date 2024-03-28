<?php

namespace Gustafl\Aeroporto;

class Pista {

    private int $id;
    private int $tamanho;
    private string $status;

    public function __construct(int $id, int $tamanho) {
        $this->id = $id;
        $this->status = 'INATIVO';

        if ($tamanho >= 1 && $tamanho <= 3){
        $this->tamanho = $tamanho;
        }else{
            echo 'Tamanho inválido, use uma dessas opções: (1) PEQUENO, (2) MEDIO, (3) GRANDE';
        }
    }

    public function setStatus(int $status) : void {
        if ($status == 1){
            $this->status = 'DISPONIVEL';
        }else if($status == 2){
            $this->status = 'EM USO';
        }else{
            $this->status = 'INATIVO';
        }
    }

    public function getId() : int {
        return $this->id;
    }

    public function getTamanho() : int {
        return $this->tamanho;
    }

    public function getTamanhoString() : string {
        switch ($this->tamanho){
            case 1:
                return 'PEQUENO';
                break;
            case 2:
                return 'MEDIO';
                break;
            case 3:
                return 'GRANDE';
                break;
            default:
                return 'INDEFINIDO';
        }
    }


    public function getStatus() : string {
        return $this->status;
    }
}