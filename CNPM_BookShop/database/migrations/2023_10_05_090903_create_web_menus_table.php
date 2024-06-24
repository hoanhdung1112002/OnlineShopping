<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_menus', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('menu_name', 50);
            $table->string('controller_name', 50)->nullable();
            $table->string('action_name', 50)->nullable();
            $table->integer('level')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('menu_order')->nullable();
            $table->integer('position')->nullable();
            $table->string('link', 255)->nullable();
            $table->string('create_by', 50)->nullable();
            $table->string('update_by', 50)->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('description', 255)->nullable();
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
        Schema::dropIfExists('web_menus');
    }
};
