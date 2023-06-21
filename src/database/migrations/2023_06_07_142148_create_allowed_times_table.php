<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('allowed_times', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('message', 255)->nullable();
            $table->time('ini_segunda')->nullable();
            $table->time('fin_segunda')->nullable();
            $table->time('ini_terca')->nullable();
            $table->time('fin_terca')->nullable();
            $table->time('ini_quarta')->nullable();
            $table->time('fin_quarta')->nullable();
            $table->time('ini_quinta')->nullable();
            $table->time('fin_quinta')->nullable();
            $table->time('ini_sexta')->nullable();
            $table->time('fin_sexta')->nullable();
            $table->time('ini_sabado')->nullable();
            $table->time('fin_sabado')->nullable();
            $table->time('ini_domingo')->nullable();
            $table->time('fin_domingo')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowed_times');
    }
};
