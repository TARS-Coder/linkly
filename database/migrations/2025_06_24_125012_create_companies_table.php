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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("email")->unique();
            $table->String("desc", 1000)->nullable();
            $table->boolean("is_active")->default(true);
            $table->timestamps();
            $table->softDeletes(); // This will add the deleted_at column and enable soft deletes   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
