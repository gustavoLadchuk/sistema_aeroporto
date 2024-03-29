<?php

namespace Gustafl\Aeroporto;

Enum Status {

    case ATIVO;
    case INATIVO;
    case EM_MANUTENCAO;
    case DISPONIVEL;
    case INDISPONIVEL;
    case EM_VOO;

    case NAO_EMBARCADO;
    case EMBARCADO;
    case CHECKIN;
    

}