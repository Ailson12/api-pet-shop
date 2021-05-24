<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    public function run()
    {
        // colocar no readmed do projeto na seção de dependencias do grafico
        //(https://coreui.io/vue/docs/components/charts.html)
        Funcionario::truncate();

        $funcionarios = [
            [
                "nome" => "Ailson Roberto",
                "sexo" => Funcionario::SEXO_MASCULINO,
                "setor" => Funcionario::SETOR_VENDA,
                "data_nascimento" => date("Y-m-d"),
            ],
            [
                "nome" => "Jhon Arlison",
                "sexo" => Funcionario::SEXO_MASCULINO,
                "setor" => Funcionario::SETOR_ADMINISTRACAO,
                "data_nascimento" => date("Y-m-d"),
            ],
            [
                "nome" => "Marcos Eduardo",
                "sexo" => Funcionario::SEXO_MASCULINO,
                "setor" => Funcionario::SETOR_ESTOQUE,
                "data_nascimento" => date("Y-m-d"),
            ],
            [
                "nome" => "Ademir junior",
                "sexo" => Funcionario::SEXO_MASCULINO,
                "setor" => Funcionario::SETOR_VENDA,
                "data_nascimento" => date("Y-m-d"),
            ],
            [
                "nome" => "Miriam Gomes",
                "sexo" => Funcionario::SEXO_FEMININO,
                "setor" => Funcionario::SETOR_ESTOQUE,
                "data_nascimento" => date("Y-m-d"),
            ],
            [
                "nome" => "Fabiana Silva",
                "sexo" => Funcionario::SEXO_FEMININO,
                "setor" => Funcionario::SETOR_VENDA,
                "data_nascimento" => date("Y-m-d"),
            ],
            [
                "nome" => "Ivete sangalo",
                "sexo" => Funcionario::SEXO_FEMININO,
                "setor" => Funcionario::SETOR_ADMINISTRACAO,
                "data_nascimento" => date("Y-m-d"),
            ]
        ];

        foreach ($funcionarios as $item) {
            Funcionario::create($item);
        }
    }
}
