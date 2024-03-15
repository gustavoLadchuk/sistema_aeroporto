<?php

class Voo {

    private int $id;
    private Aeronave $aeronave;
    private EquipeBordo $equipeBordo;
    private Aeroporto $aeroportoOrigem;
    private Aeroporto $aeroportoDestino;
    private array $passageiros;
    private string $horario;
    private int $distancia;
    private string $status;



    public function __construct(int $id)
    {
        $this->id = $id;
        $this->status = 'INATIVO';
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
        $this->status = 'DISPONIVEL';
    }

    public function iniciarVoo(): void
    {
        $this->status = 'INDISPONIVEL';
    }



    //TODO adicionar verificação de se o passageiro pode embarcar no voo
    public function addPassageiros(Passageiro $passageiro) 
    {

        array_push($this->passageiros, $passageiro);
        $this->aeronave->adicionarPeso($passageiro->getPeso());
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

    public function setHorario(int $hora, int $minuto) //TODO criar um sistema para formatar a hora corretamente
    {
        if ($hora >= 0 && $hora <= 23)
        {
            if ($minuto <= 0 && $minuto <= 59){
                $this->horario = $hora . ':'. $minuto;
            }
            
        }
        
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

    public function getHorario() : string
    {
        return $this->horario;
    }

    public function getDistancia() : int
    {
        return $this->distancia;
    }

    public function getStatus() : int
    {
        return $this->status;
    }
}