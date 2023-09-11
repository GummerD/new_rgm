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
    Schema::create('profiles', function (Blueprint $table) {
      $table->foreignId('user_id')
        ->references('id')
        ->on('users')
        ->cascadeOnDelete();
      $table->foreignId('avatar_id')
        ->references('id')
        ->on('avatars')
        ->cascadeOnDelete();
      $table->float('rating', 8, 2)->unsigned();
      $table->integer('correct_answer')->unsigned();
      $table->integer('incorrect_answer')->unsigned();
      $table->integer('num_trainings')->unsigned();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('profiles');
  }
};
