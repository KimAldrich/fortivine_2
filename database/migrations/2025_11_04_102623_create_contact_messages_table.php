<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('company')->nullable();
            $t->string('email');
            $t->string('subject');
            $t->enum('type', ['contact', 'support'])->default('contact');
            $t->enum('status', ['new', 'open', 'closed'])->default('new');
            $t->text('message');
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};