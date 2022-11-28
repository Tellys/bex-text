<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosComprarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_comprars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("pedido_id")->constrained();
            $table->foreignId("produto_id")->constrained();
            $table->integer('quantidade')->default(1);
            $table->float('price')->nullable()->default('0');
            $table->float('custo')->nullable()->default('0');
            $table->string('produto_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_comprars');
    }
}
