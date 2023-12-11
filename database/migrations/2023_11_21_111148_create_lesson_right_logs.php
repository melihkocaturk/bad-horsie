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
        Schema::create('lesson_right_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Club::class);
            $table->foreignIdFor(\App\Models\User::class);
            $table->integer('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_right_logs');
    }
};
