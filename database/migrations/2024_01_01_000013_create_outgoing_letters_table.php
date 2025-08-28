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
        Schema::create('outgoing_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter_number')->unique();
            $table->string('recipient');
            $table->string('subject');
            $table->text('content')->nullable();
            $table->date('sent_date');
            $table->date('letter_date');
            $table->string('attachment_path')->nullable();
            $table->foreignId('category_id')->constrained('letter_categories')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('letter_statuses')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('letter_number');
            $table->index('recipient');
            $table->index('subject');
            $table->index('sent_date');
            $table->index('letter_date');
            $table->index(['status_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_letters');
    }
};