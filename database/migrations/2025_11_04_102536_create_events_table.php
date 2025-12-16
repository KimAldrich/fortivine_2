<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('slug')->unique();
            $t->timestamp('start_at');
            $t->timestamp('end_at')->nullable();
            $t->string('location')->nullable();
            $t->string('summary')->nullable();
            $t->longText('body')->nullable();
            $t->string('banner_path')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};