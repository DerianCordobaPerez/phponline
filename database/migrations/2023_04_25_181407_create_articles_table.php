<?php

declare(strict_types=1);

use Domains\Content\Enums\Category;
use Domains\Content\Enums\Level;
use Domains\Content\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('summary', 160);
            $table->text('content');

            $table->string('status')->default(Status::DRAFT->value);
            $table->string('level')->default(Level::ENTRY->value);
            $table->string('category')->default(Category::TUTORIAL->value);

            $table->string('canonical_url')->nullable();
            $table->boolean('original')->default(false);

            $table
                ->foreignUlid('source_id')
                ->nullable()
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUlid('user_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete();

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
