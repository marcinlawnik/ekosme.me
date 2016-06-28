<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddProposedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposed', function (Blueprint $table) {
            Schema::create('proposed', function (Blueprint $table) {
                $table->increments('id');
                $table->string('filename');
                $table->string('name');
                $table->string('email');
                $table->string('useragent');
                $table->text('description');
                $table->string('ip');
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proposed');
    }
}
