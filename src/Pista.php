<?php

namespace Gustafl\Aeroporto;

class Pista {

    private int $id;
    private Tamanho $tamanho;
    private Status $status;

    public function __construct(int $id, Tamanho $tamanho) {
        $this->id = $id;
        $this->status = Status::DISPONIVEL;
        $this->tamanho = $tamanho;
    }

    public function setStatus(Status $status) : void {
        $this->status = $status;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getTamanho() : Tamanho {
        return $this->tamanho;
    }

    public function getStatus() : Status {
        return $this->status;
    }
}