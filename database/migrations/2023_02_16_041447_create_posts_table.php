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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title",500)->nullable();            
            $table->string("slug",255)->nullable();
            $table->text("description")->nullable(); // se adiciono en video 45.
            $table->text("content")->nullable();
            $table->string("image")->nullable();
            $table->enum("posted",['yes','not'])->default('not');
            $table->timestamps();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // llave foranea de categorias 1 categoria tiene varios posts
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
