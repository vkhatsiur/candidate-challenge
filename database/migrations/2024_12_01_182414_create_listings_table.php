<?php

use App\Enums\ListingStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->unsignedTinyInteger('status')->default(ListingStatus::Draft->value);
            $table->text('description')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->string('image');
            $table->integer('price');
            $table->string('currency');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
