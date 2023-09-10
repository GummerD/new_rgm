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
      $table->bigIncrements('id');
      $table->foreignId('level_id')
        ->references('id')
        ->on('levels')
        ->cascadeOnDelete();
      $table->integer('num_task')->unsigned();
      $table->text('task_text');
      $table->text('rule_use')->nullable();
      $table->text('correct_answer');
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
