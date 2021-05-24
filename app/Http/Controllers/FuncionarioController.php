<?php

namespace App\Http\Controllers;

use Throwable;
use App\Services\Funcionario\CardTotalFuncionarioService;
use Illuminate\Http\Request;
use App\Services\Funcionario\FuncionarioService;
use App\Services\Funcionario\GetSetorfuncionarioService;

class FuncionarioController extends Controller
{
    
    public function index()
    {
        try {
            $response = FuncionarioService::get();
            return response()->json(["dados" => $response["funcionarios"]]);
        } catch (Throwable $throwable) {
            return response()->json(["mensagem" => $throwable->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $response = FuncionarioService::store($request->all());
            return response()->json(["mensagem" => $response["mensagem"]], 200);
        } catch (Throwable $throwable) {
            return response()->json(["mensagem" => $throwable->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        try {
            $response = FuncionarioService::getFuncionarioById($id);
            return response()->json(["funcionario" => $response["funcionario"]], 200);
        } catch (Throwable $throwable) {
            return response()->json(["mensagem" => $throwable->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = FuncionarioService::update($request->all(), $id);
            return response()->json(["mensagem" => $response["mensagem"]], 200);
        } catch (Throwable $throwable) {
            return response()->json(["mensagem" => $throwable->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $response = FuncionarioService::destroy($id);
            return response()->json(["mensagem" => $response["mensagem"]], 200);
        } catch (Throwable $throwable) {
            return response()->json(["mensagem" => $throwable->getMessage()], 500);
        }
    }

    public function totalFuncionarios($sexo = null)
    {
        try {
            $response = CardTotalFuncionarioService::getFuncionarios($sexo);
            return response()->json(["sexo" => $sexo, "total" => $response["total"]], 200);
        } catch (Throwable $throwable) {
            return response()->json(["mensagem" => $throwable->getMessage()], 500);
        }
    }

    public function setoresFuncionarios()
    {
        try {
            $response = GetSetorfuncionarioService::get();
            return response()->json([$response["setoresFuncionarios"]], 200);
        } catch (Throwable $throwable) {
            return response()->json(["mensagem" => $throwable->getMessage()], 500);
        }
    }
}
