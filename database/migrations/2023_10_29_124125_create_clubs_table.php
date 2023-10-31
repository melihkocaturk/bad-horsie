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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo')->nullable()->default('no-image.png');
            $table->string('banner')->nullable()->default('no-image.png');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('coordinates')->nullable();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
