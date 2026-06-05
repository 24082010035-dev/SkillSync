<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyek_mentors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mentor_id');

            $table->string('judul_proyek');

            $table->text('deskripsi')->nullable();

            $table->string('file_proyek');

            $table->timestamps();

            $table->foreign('mentor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyek_mentors');
    }
};