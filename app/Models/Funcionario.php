<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $guarded = ["id"];

    const SETORES = [
        self::SETOR_VENDA => "Venda",
        self::SETOR_ADMINISTRACAO => "Administração",
        self::SETOR_ESTOQUE => "Controle de Estoque",
    ];

    const SETOR_VENDA = "VE";
    const SETOR_ADMINISTRACAO = "AD";
    const SETOR_ESTOQUE = "ES";

    const SEXOS = [
        self::SEXO_MASCULINO => "Masculino",
        self::SEXO_FEMININO => "Feminino",
    ];

    const SEXO_MASCULINO = "M";
    const SEXO_FEMININO = "F";
}