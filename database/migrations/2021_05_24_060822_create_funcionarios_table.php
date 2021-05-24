<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome")->comment("Nome do funcionário");
            $table->date("data_nascimento")->comment("Data de nascimento do funcionário");
            $table->enum("setor", ["VE", "AD", "ES"])->comment("[VE => 'vendas', AD => Administração, ES => Controle de estoque]");
            $table->enum("sexo", ["M", "F"])->comment("[m => masculino, f => feminino]");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
