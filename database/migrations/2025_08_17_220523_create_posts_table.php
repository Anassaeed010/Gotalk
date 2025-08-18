<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table ->string('title') ;
            $table->text('content');
            $table->string ('category') ;
             $table->unsignedBigInteger('user_id')->nullable();  
             $table->integer('likes')->default(0); 
               $table->integer('comments_count')->default(0);  
                 $table->string('image')->nullable(); 


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
