<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $t) {
            $t->id();
            $t->string('category')->nullable();
            $t->string('question');
            $t->text('answer');
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};