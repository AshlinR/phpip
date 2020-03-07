<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('style_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('format',4);
            $table->string('path',255);
            $table->string('subject',160);
            $table->text('body');
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
        Schema::dropIfExists('template_members');
    }
}
