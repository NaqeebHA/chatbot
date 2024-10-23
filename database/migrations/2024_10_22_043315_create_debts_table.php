<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('debt')) {
            Schema::create('debt', function (Blueprint $table) {
                $table->id();
                $table->string('debt_type');
                $table->string('total_amount');
                $table->string('paid_amount');
                $table->string('outstanding_balance');
                $table->string('due_date');
                $table->foreignId('debtor_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('debts');
    }
}
