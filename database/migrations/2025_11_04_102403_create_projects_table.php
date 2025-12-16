<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('slug')->unique();
            $t->string('excerpt')->nullable();
            $t->longText('body')->nullable();
            $t->enum('sector', ['agri', 'energy', 'urban'])->index();
            $t->json('results')->nullable(); // e.g., {"footprint":"18% reduction"}
            $t->string('cover_path')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};