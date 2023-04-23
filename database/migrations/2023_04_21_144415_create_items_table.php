<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantity')->unsigned();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');
            //Clave foranea que referencia al id de la orden correspondiente.
            //onDelete asegura que cuando se borra una orden, todos los items asociados tambien se borraran.
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            //Clave foranea que referencia al id del producto asociado.
            //onDelete asegura que cuando se borra un producto, todos los items asociados tambien se borraran.        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
