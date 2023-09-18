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
      $table->string('path_img')->default('/asset/Images/Background/fon1.png');
      $table->float('rating', 8, 2)->nullable()->default(0);
      $table->integer('correct_answer')->nullable()->default(0);
      $table->integer('incorrect_answer')->nullable()->default(0);
      $table->integer('num_trainings')->nullable()->default(0);
      $table->text('progress')->nullable()->default('1/1/1');
      $table->timestamps();
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
