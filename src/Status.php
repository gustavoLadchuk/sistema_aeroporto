<?php

namespace Gustafl\Aeroporto;

Enum Status : string {

    case ATIVO = 'Ativo';
    case INATIVO = 'Inativo';
    case EM_MANUTENCAO = 'Em manutenção';
    case DISPONIVEL = 'Disponível';
    case INDISPONIVEL = 'Indisponível';
    case EMBARCANDO = 'Embarcando';
    case PRONTO_PARA_VOO = 'Pronto para voo';
    case EM_VOO = 'Em Voo';
    case DESEMBARCANDO = 'Desembarcando';
    case ENCERRADO = 'Encerrado';

    case NAO_EMBARCADO = 'Não embarcado';
    case EMBARCADO = 'Embarcado';
    case CHECKIN = 'Check In';

    case NAO_DESPACHADA = 'Não despachada';
    case DESPACHADA = 'Despachada';
    case DISPONIVEL_COLETA = 'Disponível para coleta';
    case COLETADA = 'Coletada';
    

}