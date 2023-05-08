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
        Schema::create('todoes', function (Blueprint $table) {
            $table->id();
            $table->string('tasktype', 15);
            $table->string('company', 255);
            $table->string('contact', 255);
            $table->string('subject', 255);
            $table->bigInteger('owner');
            $table->bigInteger('assignto');
            $table->date('duedate');
            $table->date('reminder');
            $table->string('priority', 15);
            $table->text('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todoes');
    }
};
