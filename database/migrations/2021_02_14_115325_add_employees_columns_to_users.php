<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeesColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic');
            $table->string('passport');
            $table->double('salary');
            $table->string('photo_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('name');
            $table->dropColumn('patronymic');
            $table->dropColumn('passport');
            $table->dropColumn('salary');
            $table->dropColumn('photo_path');
        });
    }
}
