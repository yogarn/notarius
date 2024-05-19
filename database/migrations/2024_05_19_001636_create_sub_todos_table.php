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
        Schema::create('sub_todos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('todo_id')->constrained('todos');
            $table->string('title');
            $table->longText('detail')->nullable();
            $table->dateTime('due', 0)->nullable();
            $table->dateTime('scheduled', 0)->nullable();
            $table->integer('priority');
            $table->boolean('isCompleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_todos');
    }
};
