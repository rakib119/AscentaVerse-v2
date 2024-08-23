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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id'); ;
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique()->index('service_slug');
            $table->text('short_description')->max(400);
            $table->string('thumbnail')->nullable();
            $table->string('button_name');
            $table->string('icon')->nullable();
            $table->enum('is_displayed_in_home',[0,1])->comment('0 for No 1 for Yes')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
