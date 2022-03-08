<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('menters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('m_name');
            $table->string('m_email')->unique();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('menters');
    }
};
