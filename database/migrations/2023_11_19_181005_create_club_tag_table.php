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
        Schema::create('club_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Club::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_tag');
    }
};
