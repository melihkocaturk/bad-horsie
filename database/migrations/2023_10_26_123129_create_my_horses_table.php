<?php

use App\Models\MyHorse;
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
        Schema::create('my_horses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('avatar')->nullable()->default('no-image.png');
            $table->enum('gender', array_keys(MyHorse::$gender));
            $table->string('race')->nullable();
            $table->string('color')->nullable();
            $table->unsignedTinyInteger('height')->nullable();
            $table->string('fei_id')->nullable();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_horses');
    }
};
