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
        Schema::create('web_configs', function (Blueprint $table) {
            $table->id();
            $table->string('hero_landing_copywriting');
            $table->string('about_landing_copywriting');
            $table->string('partner_copywriting');
            $table->string('contact_copywriting');
            $table->string('hero_who_copywriting');
            $table->string('subheading_who');
            $table->string('who_copywriting');
            $table->string('hero_what_copywriting');
            $table->string('hero_case_studies_copywriting');
            $table->string('hero_contact_copywriting');
            $table->longText('hero_landing_image')->nullable();
            $table->longText('about_landing_image_1')->nullable();
            $table->longText('about_landing_image_2')->nullable();
            $table->longText('about_landing_image_3')->nullable();
            $table->longText('about_landing_image_4')->nullable();
            $table->longText('video_landing_link');
            $table->longText('hero_who_image')->nullable();
            $table->longText('hero_what_image')->nullable();
            $table->longText('hero_case_studies_image')->nullable();
            $table->longText('hero_contact_image')->nullable();
            $table->longText('app_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_configs');
    }
};
