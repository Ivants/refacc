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
        Schema::create('products',function(Blueprint $tabla){
            $tabla->increments("id");
            //Este campo tiene relacion con la tabla de usuarios para saber quien creo el producto
            //Este sera la llave primaria
            $tabla->integer('user_id')->unsigned()->index();
            $tabla->string('title');
            $tabla->text('description');
            $tabla->decimal('pricing',9,2); //Centavos, precision, decimales, 7 numeros con 2 decimales

            
            //crea los campos de creacion y ultima actualizacion
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
        //php artisan migrate:rollback  <- para deshacer la tabla que hicimos
        Schema::drop('products');
    }
}
