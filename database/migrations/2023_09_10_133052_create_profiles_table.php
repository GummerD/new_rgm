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
      $table->string('path_img')->default("/asset/Images/Background/fon1.png");
      $table->float('rating', 8, 2)->nullable();
      $table->integer('correct_answer')->nullable();
      $table->integer('incorrect_answer')->nullable();
      $table->integer('num_trainings')->nullable();
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
