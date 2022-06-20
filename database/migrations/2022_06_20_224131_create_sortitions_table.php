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
        Schema::create('sortitions', function (Blueprint $table) {
            $table->uuid();
            $table->string('nickname', 200);
            $table->text('description')->nullable();
            $table->boolean('performed')->default(false);
            $table->string('type', 200)->default('');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sortitions');
    }
};