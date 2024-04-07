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
    private float $distancia;
    private int $tempoDeVoo;
    private float $consumoCombustivel;
    private Status $status;



    public function __construct(
        int $id, 
        Aeronave $aeronave,
        Aeroporto $origem, 
        Aeroporto $destino, 
        Tempo $horario, 
        EquipeBordo $equipeBordo)
    {
        $this->id = $id;
        $this->aeronave = $aeronave;
        $this->aeroportoOrigem = $origem;
        $this->aeroportoDestino = $destino;
        $this->status = Status::INATIVO;
        $this->passageiros = [];
        $this->horario = $horario;
        $this->equipeBordo = $equipeBordo;
        
        $origem = $this->aeroportoOrigem->getLocalizacao();
        $destino = $this->aeroportoDestino->getLocalizacao();
        $latitude1 = $origem->getLatitude();
        $latitude2 = $destino->getLatitude();
        $longitude1 = $origem->getLongitude();
        $longitude2 = $destino->getLongitude();
        $theta = $longitude1 - $longitude2; 
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
        $distance = acos($distance); 
        $distance = rad2deg($distance); 
        $distance = $distance * 60 * 1.1515; 
        
        $this->distancia = (round($distance,2));

        $this->tempoDeVoo = ($this->distancia * 1.609344) / 800;

        $this->consumoCombustivel = 500 * $this->tempoDeVoo;

    }



    public function disponibilizarVoo(): void {
        $this->status = Status::DISPONIVEL;
    }

    public function iniciarVoo(): string
    {
        if ($this->aeronave->getStatus() == Status::PRONTO_PARA_VOO){
            $this->status = Status::EM_VOO;
            return 'Voo iniciado';
        }
        return 'O voo não pode ser iniciado';
    }

    public function finalizarVoo(): string
    {
        if ($this->aeronave->getStatus() == Status::DESEMBARCANDO){
        $this->status = Status::ENCERRADO;
        return 'Voo encerrado';
        }
        return 'Não pode encerrar o voo';
    }

    public function embarcarPassageiro(Passageiro $passageiro): string
    {
        if ($passageiro->getStatus() == Status::CHECKIN) {
            $passageiro->getPassagem()->usarPassagem();
            $passageiro->setStatus(Status::EMBARCADO);
            return $this->aeronave->addPassageiro($passageiro);
        } 
        return 'O passageiro não pode embarcar';
        }
    

    public function desembarcarPassageiro(Passageiro $passageiro): string
    {
        if ($passageiro->getStatus() == Status::EMBARCADO) {
            $this->aeronave->removePassageiro($passageiro);
            return 'O passageiro desembarcou';
        }
            return 'O passageiro não pode desembarcar';
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

    public function getStatus() : Status
    {
        return $this->status;
    }

    public function getPassageiros() : array
    {
        return $this->passageiros;
    }

    public function getDistancia($unidade) : float {
        
        switch($unidade) { 
            case 'milhas': 
                return $this->distancia;
              break; 
            case 'kilometros' : 
            return $this->distancia * 1.609344; 
          } 
      }

    public function getTempoVoo() : int
      {
        return $this->tempoDeVoo;
      }

    public function getConsumoCombustivel() : float
      {
        return $this->consumoCombustivel;
      }
}