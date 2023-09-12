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
        Schema::create('votables', function (Blueprint $table) {
            $table->primary(['user_id', 'votable_id', 'votable_type']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('votable_id');
            $table->string('votable_type');
            $table->integer('vote');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votables');
    }
};
