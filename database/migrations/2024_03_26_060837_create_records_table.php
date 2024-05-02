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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->unique()->index();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable()->default(null);
            $table->string('ext_name', 30)->nullable()->default(null);
            $table->string('date_of_birth');
            $table->enum('civil_status', ['single', 'married', 'widow', 'separated']);
            $table->text('address');
            $table->string('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
