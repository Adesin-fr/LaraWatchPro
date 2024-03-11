<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('app_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('app_id');

            $table->string('level');
            $table->string('message');
            $table->string('userId')->nullable();
            $table->string('file')->nullable();
            $table->integer('line')->nullable();
            $table->longText('trace')->nullable();
            $table->longText('codeExcerpt')->nullable();

            $table->timestamps();

            $table->index([
                'app_id',
                'level'
            ]);

            $table->fullText('message');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('app_logs');
    }
};
