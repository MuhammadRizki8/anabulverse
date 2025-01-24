<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        $table->string('title');
        $table->string('image_url'); // URL atau path gambar
        $table->text('caption');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('posts');
}
    
};
