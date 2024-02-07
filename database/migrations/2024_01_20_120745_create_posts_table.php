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
            $table->enum('region', ['北海道', '東北', '関東', '中部', '近畿', '中国', '四国', '九州', '沖縄']);
            $table->enum('season', ['春', '夏', '秋', '冬']);
            $table->enum('participants', ['１人', '２人', '３～５人', '６人～']);
            $table->enum('budget', ['～１万円', '～３万円', '～５万円', '～１０万円', '１０万円～']);
            $table->enum('stay_duration', ['日帰り', '１泊', '２泊', '３泊', '４泊～']);
            $table->string('title', 255);
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
