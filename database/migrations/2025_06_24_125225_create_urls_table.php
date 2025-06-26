<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255)->nullable();
            $table->string("original_url", 5000);
            $table->string("short_url", 255)->nullable();;
            $table->unsignedInteger("clicks");
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("company_id")->constrained("companies");
            $table->boolean("is_active")->default(true);
            $table->timestamp("deleted_at")->nullable()->default(null);   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
