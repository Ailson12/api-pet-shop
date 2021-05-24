<?php

namespace App\Services\Funcionario;

use Exception;
use Throwable;
use App\Models\Funcionario;
use App\Services\LogService;

class GetSetorfuncionarioService
{
    public static function get()
    {
        try {
            $setoresFuncionarios = Funcionario::query()
                ->selectRaw("
                    count(setor) as total,
                    (case setor when 'VE' then 'Venda' when 'AD' then 'Administração' when 'ES' then 'Controle de Estoque' end) as setor"
                )
                ->groupBy("setor")
                ->get();

            return [
                "setoresFuncionarios" => $setoresFuncionarios
            ];
        } catch (Throwable $throwable) {
            LogService::log($throwable);
            throw new Exception("Erro ao listar setores dos funcionários", 500);
        }
    }
}