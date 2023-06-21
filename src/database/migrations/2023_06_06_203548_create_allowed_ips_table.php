<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowedIpsTable extends Migration
{
    public function up()
    {
        Schema::create('allowed_ips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip')->nullable(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('allowed_ips');
    }
}
