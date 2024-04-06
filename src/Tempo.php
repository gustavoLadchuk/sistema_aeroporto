<?php

namespace Gustafl\Aeroporto;

class Tempo
{

    private int $horas;
    private int $minutos;
    private int $segundos;

    public function __construct(int $horas, int $minutos, int $segundos)
    {   
        $this->segundos = $segundos % 60;

        $this->minutos = $segundos / 60;
        $this->minutos += $minutos % 60;

        $this->horas = $minutos / 60;
        $this->horas += $horas;

    }


    public function getHoras(): int
    {
        return $this->horas;
    }

    public function getMinutos(): int
    {
        return $this->minutos;
    }

    public function getSegundos(): int
    {
        return $this->segundos;
    }


    public function converterParaMinutos() : int
    {
        $totalMinutos = ($this->horas * 60) + $this->minutos;

        return $totalMinutos;

    }

    public function converterParaSegundos() : int
    {
        $totalSegundos = ($this->horas * 3600) + ($this->minutos * 60) + $this->segundos;

        return $totalSegundos;
    }

    


    public function horarioToString(bool $mostrarSegundos): string
    {
        $horarioFormatado = '';
        $horasFormatadas = '';
        $minutosFormatados = '';
        $segundosFormatados = '';

        if ($this->horas < 10){
            $horasFormatadas = '0';
        }
        $horasFormatadas = $horasFormatadas . $this->horas;

        if ($this->minutos < 10){
            $minutosFormatados = '0';
        }
        $minutosFormatados = $minutosFormatados . $this->minutos;

        if ($this->segundos < 10){
            $segundosFormatados = '0';
        }
        $segundosFormatados = $segundosFormatados . $this->segundos;

        $horarioFormatado = $horasFormatadas . ':' . $minutosFormatados;

        if ($mostrarSegundos) {
            $horarioFormatado = $horarioFormatado . ':' . $segundosFormatados;
        }

        return $horarioFormatado;
    }
}
