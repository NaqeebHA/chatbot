<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('questions')) {
            Schema::create('questions', function (Blueprint $table) {
                $table->id();
                $table->string('question');
                $table->string('answer');
                $table->string('question_type')->nullable();
                $table->string('followup_question_ids')->nullable();
                $table->boolean('is_starter')->default(false);
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
