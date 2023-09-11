<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('tasks', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('level_id')->unsigned()->default('1');
      $table->foreign('level_id')->references('id')->on('levels');
      $table->integer('num_task')->unsigned()->nullable();
      $table->text('task_text')->nullable();
      $table->text('rule_use')->nullable();
      $table->text('correct_answer')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tasks');
  }
};
