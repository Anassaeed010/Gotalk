<?php

use App\Models\Tweets;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('email_id') ->unique()
                ->nullable()->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('followee_id')
               ->nullable()
             ->constrained('users')
                ->nullable()
                ->cascadeOnDelete();
               
     
            
          
         
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
