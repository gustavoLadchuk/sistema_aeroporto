<?php

class Aeronave {

    private int $id;
    private string $modelo;
    private int $idAeroporto;
    private int $capacidade;
    private string $status;


    public function __construct($id, $modelo, $capacidade)
    {
        $this->id = $id;
        $this->modelo = $modelo;
        $this->capacidade = $capacidade;
    }



    public function setAeroporto($id) : void
    {
        $this->idAeroporto = $id;
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

    public function getAeroporto(): string {
        return $this->idAeroporto;
    }

    public function getCapacidade(): int {
        return $this->capacidade;
    }

    public function getStatus(): string {
        return $this->status ?? 'Inválido';
    }




}