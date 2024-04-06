<?php

namespace Gustafl\Aeroporto;

class Voo {

    private int $id;
    private Aeronave $aeronave;
    private EquipeBordo $equipeBordo;
    private Aeroporto $aeroportoOrigem;
    private Aeroporto $aeroportoDestino;
    private array $passageiros;
    private Tempo $horario;
    private int $distancia;
    private Status $status;



    public function __construct(int $id, Aeroporto $origem, Aeroporto $destino)
    {
        $this->id = $id;
        $this->aeroportoOrigem = $origem;
        $this->aeroportoDestino = $destino;
        $this->status = Status::INATIVO;
        $this->passageiros = [];
        
    }



    function calcularDistancia(Local $origem, Local $destino, $unidade) {
        $latitude1 = $origem->getLatitude();
        $latitude2 = $destino->getLatitude();
        $longitude1 = $origem->getLongitude();
        $longitude2 = $destino->getLongitude();
        $theta = $longitude1 - $longitude2; 
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
        $distance = acos($distance); 
        $distance = rad2deg($distance); 
        $distance = $distance * 60 * 1.1515; 
        switch($unidade) { 
          case 'milhas': 
            break; 
          case 'kilometros' : 
            $distance = $distance * 1.609344; 
        } 
        return (round($distance,2)); 
      }

    public function disponibilizarVoo(): void {
        $this->status = Status::DISPONIVEL;
    }

    public function iniciarVoo(): void
    {
        $this->status = Status::EM_VOO;
    }




    public function addPassageiros(Passageiro $passageiro) 
    {
        array_push($this->passageiros, $passageiro);
        if ($this->passageiros == $this->aeronave->getCapacidade()->getPassageiros())
        {
            $this->status == Status::INDISPONIVEL;
        }
    }



    public function setAeronave(Aeronave $aeronave) 
    {
        $this->aeronave = $aeronave;
    }

    public function setEquipeBordo(EquipeBordo $equipeBordo) 
    {
        $this->equipeBordo = $equipeBordo;
    }

    public function setOrigem(Aeroporto $origem) 
    {
        $this->aeroportoOrigem = $origem;
    }

    public function setDestino(Aeroporto $destino) 
    {
        $this->aeroportoDestino = $destino;
    }

    public function setHorario(Tempo $horario)
    {
        $this->horario = $horario;
    }

    
    public function getId() : int
    {
        return $this->id;
    }

    public function getAeronave() : Aeronave
    {
        return $this->aeronave;
    }

    public function getEquipeBordo() : EquipeBordo
    {
        return $this->equipeBordo;
    }

    public function getOrigem() : Aeroporto
    {
        return $this->aeroportoOrigem;
    }

    public function getDestino() : Aeroporto
    {
        return $this->aeroportoDestino;
    }

    public function getHorario() : Tempo
    {
        return $this->horario;
    }

    public function getDistancia() : int
    {
        return $this->distancia;
    }

    public function getStatus() : Status
    {
        return $this->status;
    }

    public function getPassageiros() : array
    {
        return $this->passageiros;
    }
}