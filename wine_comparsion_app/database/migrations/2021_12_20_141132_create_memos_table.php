<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('folder_id');
            $table->integer('countries_id');
            $table->integer('types_id');
            $table->integer('grapes_id');
            $table->integer('aroma_categories_id');
            $table->string('name');
            $table->text('content');
            $table->integer('comprehensive_evaluation');
            $table->integer('flavor');
            $table->integer('bitter_taste');
            $table->integer('afterglow');
            $table->integer('taste');
            $table->integer('bodied');
            $table->integer('sweet_taste');
            $table->integer('fruit_taste');
            $table->integer('acidity_taste');
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
        Schema::dropIfExists('memos');
    }
}
