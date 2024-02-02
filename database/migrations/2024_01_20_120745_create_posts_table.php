<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('region');
            $table->string('season');
            $table->integer('participants');
            $table->string('budget');
            $table->integer('stay_duration');
            $table->string('transportation');
            $table->string('title', 50);
            $table->text('content', 10000);
            $table->boolean('is_public')->default(true);
            $table->integer('likes')->default(0);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
