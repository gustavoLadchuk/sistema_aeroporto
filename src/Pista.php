<?php

namespace Gustafl\Aeroporto;

class Pista extends Estrutura
{

    private Tamanho $tamanho;
    private Status $status;

    public function __construct(int $id, Tamanho $tamanho)
    {
        parent::__construct($id);
        $this->status = Status::DISPONIVEL;
        $this->tamanho = $tamanho;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }


    public function getTamanho(): Tamanho
    {
        return $this->tamanho;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}
