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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Club::class)->constrained()->onDelete('cascade');
            $table->string('name');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->foreignIdFor(\App\Models\User::class, 'trainer_id');
            $table->foreignIdFor(\App\Models\User::class, 'student_id');
            $table->boolean('trainer_confirmation')->nullable();
            $table->boolean('student_confirmation')->nullable();
            $table->text('reason_for_reject')->nullable();
            $table->foreignIdFor(\App\Models\Horse::class, 'horse_id')->nullable();
            $table->tinyInteger('grade')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
