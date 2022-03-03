<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->float('fif_all', 5, 1);
            $table->float('fif_month', 5, 1);
            $table->float('fif_day', 5, 1);
            $table->float('thi_all', 5, 1);
            $table->float('thi_month', 5, 1);
            $table->float('thi_day', 5, 1);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
};
