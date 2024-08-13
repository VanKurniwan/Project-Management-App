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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->string('palette');
            $table->timestamps();
        });

        Schema::create('difficulties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->string('palette');
            $table->timestamps();
        });

        Schema::create('techstacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lowercase');
            $table->string('color');
            $table->string('palette');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->integer('priorityrank');
            $table->text('description');
            $table->string('gitrepo');
            $table->text('icon');
            $table->json('techstack_ids')->nullable();
            $table->foreignId('status_id')->constrained(
                table: 'statuses',
                indexName: 'projects_status_id',
            );
            $table->foreignId('difficulty_id')->constrained(
                table: 'difficulties',
                indexName: 'projects_difficulty_id',
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('difficulties');
        Schema::dropIfExists('techstacks');
    }
};
