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
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('body');
            $table->foreignId('writer_id') // Creates 'writer_id' column (unsignedBigInteger)
                  ->constrained('writers') // Adds foreign key constraint to 'id' on 'writers' table
                  ->onDelete('restrict'); // If a writer is deleted, their posts are also deleted.
            $table->timestamps();
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
