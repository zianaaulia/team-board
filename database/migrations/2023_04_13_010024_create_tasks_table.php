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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('bucket_id');
            $table->string('title');
            $table->enum('progress', ['Not Started', 'Started', 'Finish']);
            $table->enum('priority', ['Low', 'Middle', 'High']);
            $table->date('start_date');
            $table->date('end_date');
            $table->longtext('note');
            $table->boolean('show_on_card');
            $table->timestamps();

            $table->foreign('bucket_id')->references('id')->on('buckets')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
