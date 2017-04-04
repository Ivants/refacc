<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     * Para crear este archivo se debe ejecutar en la terminal un 'php artisan make:migration create_products_table'
     *
     * @return void
     */
    public function up()
    {
        //Realizar cambios
        Schema::create('productos',function(Blueprint $tabla){
            $tabla->increments("id");
            //Este campo tiene relacion con la tabla de usuarios para saber quien creo el producto
            $tabla->integer('user_id')->unsigned()->index();
            $tabla->string('title');
            $tabla->text('descripcion');
            $tabla->decimal('precio'); //Centavos

            
            //crea los campos de registro y ultima actualizacion
            $tabla->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Revertir cambios
    }
}
