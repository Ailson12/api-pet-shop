<?php

namespace App\Services\Funcionario;

use App\Models\Funcionario;
use Exception;
use Throwable;
use App\Services\LogService;

class CardTotalFuncionarioService
{
    public static function getFuncionarios($sexo)
    {
        try {
            $funcionario = Funcionario::when($sexo, function($query) use ($sexo) {
                $query->where("sexo", $sexo);
            })
            ->count();

            return [
                "total" => $funcionario
            ];
        } catch (Throwable $throwable) {
            LogService::log($throwable);
            throw new Exception("Erro ao contabilizar funcionários", 500);
        }
    }
}