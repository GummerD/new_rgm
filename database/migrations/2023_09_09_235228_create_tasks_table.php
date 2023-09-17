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
      $table->integer('level_id')->unsigned()->default('1');
      $table->foreign('level_id')->references('id')->on('levels');
      $table->integer('section_id')->unsigned()->default('1');
      $table->foreign('section_id')->references('id')->on('sections');
      $table->integer('group_id')->unsigned()->default('1');
      $table->foreign('group_id')->references('id')->on('groups_tasks');
      $table->integer('num_task')->unsigned()->nullable();
      $table->text('task_text')->nullable();
      $table->text('rule_use')->nullable();
      $table->text('correct_answer')->nullable();
      $table->text('string_task')->nullable();
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
