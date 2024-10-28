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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->decimal('salary', 8, 2);
            $table->enum('is_manager',[0,1])->nullable()->default(0);
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('manager_id')->nullable()->constrained('employees');
            $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
