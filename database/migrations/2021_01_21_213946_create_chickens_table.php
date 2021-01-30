<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChickensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chickens', function (Blueprint $table) {
            // О каждой курице должна храниться следующая информация:
            // вес, возраст, порода, количество ежемесячно получаемых
            // от курицы яиц, а также информация о местонахождении курицы.
            $table->id();
            $table->double('weight');
            $table->integer('age');
            $table->integer('number_of_eggs');
            $table->foreignId('breed_id');
            $table->foreignId('cell_id');
            $table->timestamps();

            // Настройка связей между таблицами.
            $table->foreign('breed_id')
                ->references('id')
                ->on('breeds');

            $table->foreign('cell_id')
                ->references('id')
                ->on('cells');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chickens');
    }
}
