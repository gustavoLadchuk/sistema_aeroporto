<?php

namespace Gustafl\Aeroporto;

Enum Status : string {

    case ATIVO = 'Ativo';
    case INATIVO = 'Inativo';
    case EM_MANUTENCAO = 'Em manutenção';
    case DISPONIVEL = 'Disponível';
    case INDISPONIVEL = 'Indisponível';
    case EM_VOO = 'Em Voo';

    case NAO_EMBARCADO = 'Não Embarcado';
    case EMBARCADO = 'Embarcado';
    case CHECKIN = 'Check In';
    

}