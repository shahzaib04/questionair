<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionairsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('questionairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->integer('user_id');
            $table->integer('no_of_ques')->default(0);
            $table->enum('time_type', ['min', 'hr']);
            $table->string('duration');
            $table->enum('resumeable', ['Yes', 'No']);
            $table->enum('published', ['Yes', 'No']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('questionairs');
    }

}
