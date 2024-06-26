<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('island_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('age')->nullable();
            $table->string('mobile')->nullable();
            $table->decimal('longitude', 10, 5);
            $table->decimal('latitude', 10, 5);
            $table->text('location')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // Foreign key constraint
            $table->foreign('island_id')->references('id')->on('islands')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}