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
        Schema::create('banks', function(Blueprint $table){
			$table->id();
			$table->string('name', 120)->unique();
			$table->string('category', 60)->nullable();
			$table->integer('bank_type')->nullable();
			$table->integer('is_active')->default(1);
			$table->integer('is_deleted')->default(0);
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->default(0);
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
