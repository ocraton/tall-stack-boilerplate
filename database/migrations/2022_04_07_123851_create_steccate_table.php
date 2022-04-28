<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steccate', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->double('altezza', 8, 2);
            $table->double('litri', 8, 2);
            $table->foreignId('product_id')->constrained('products')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steccate');
    }
};
