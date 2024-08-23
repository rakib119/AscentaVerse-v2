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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->string('name');
            $table->string('slug')->unique()->index('team_slug');
            $table->string('designation')->nullable();
            $table->string('photo')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('dtls_img')->nullable();
            $table->integer('icon1')->nullable();
            $table->integer('icon2')->nullable();
            $table->integer('icon3')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            $table->string('link3')->nullable();
            $table->string('details_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('button_name')->nullable();
            $table->text('short_description')->max(600)->nullable();
            $table->text('description')->nullable();
            $table->text('description2')->nullable();
            $table->enum('is_displayed_in_home',[0,1])->comment('0 for No 1 for Yes')->default(0);
            $table->integer('status_active')->default(1);
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
        Schema::dropIfExists('teams');
    }
};
