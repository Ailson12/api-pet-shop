<?php

namespace App\Services\Funcionario;

use Exception;
use Throwable;
use App\Models\Funcionario;
use App\Services\LogService;
use Illuminate\Support\Facades\DB;

class FuncionarioService
{
    public static function get() : array
    {
        try {
            $funcionarios = Funcionario::query()
                ->select(
                    "id",
                    "nome",
                    DB::raw(" (case setor when 'VE' then 'Venda' when 'AD' then 'Administração' when 'ES' then 'Controle de Estoque' end) as setor "),
                    DB::raw("(case sexo when 'M' then 'Masculino' else 'Feminino' end) as sexo"),
                    DB::raw("to_char(data_nascimento, 'dd/mm/YYYY') as data_nascimento")
                )
                ->get();

            return [
                "funcionarios" => $funcionarios
            ];
        } catch (Throwable $throwable) {
            LogService::log($throwable);
            throw new Exception("Erro ao listar funcionários", 500);
        }
    }

    public static function store(array $request) : array
    {
        try {
            Funcionario::create($request);
            return [
                "mensagem" => "Funcionário cadastrado com sucesso!"  
            ];
        } catch (Throwable $throwable) {
            LogService::log($throwable);
            throw new Exception("Erro ao registrar funcionário", 500);
        }
    }

    public static function getFuncionarioById($id)
    {
        try {
            $funcionario = Funcionario::findOrFail($id);
            return [
                "funcionario" => $funcionario  
            ];
        } catch (Throwable $throwable) {
            LogService::log($throwable);
            throw new Exception("Erro ao recuperar funcionário", 500);
        }
    }

    public static function update($request, $id)
    {
        try {
            $retorno = self::getFuncionarioById($id);
            $funcionario = $retorno["funcionario"];
            $funcionario->update($request);

            return [
                "mensagem" => "Funcionário atualizado com sucesso!"  
            ];
        } catch (Throwable $throwable) {
            LogService::log($throwable);
            throw new Exception("Erro ao atualizar funcionário", 500);
        }
    }

    public static function destroy($id)
    {
        try {
            $retorno = self::getFuncionarioById($id);
            $funcionario = $retorno["funcionario"];
            $funcionario->destroy($id);

            return [
                "mensagem" => "Funcionário deletado com sucesso!"  
            ];
        } catch (Throwable $throwable) {
            LogService::log($throwable);
            throw new Exception("Erro ao deletar funcionário", 500);
        }
    }
}