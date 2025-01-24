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
        Schema::create('activity_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('activity_type'); // Jenis aktivitas, seperti "Like", "Comment", "Post"
            $table->foreignId('post_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('comment_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('activity_histories');
    }
};
