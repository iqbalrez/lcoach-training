<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    use HasFactory;

    public $table = 'web_configs';

    protected $fillable = [
        'hero_landing_copywriting',
        'partner_copywriting',
        'about_landing_copywriting',
        'contact_copywriting',
        'hero_who_copywriting',
        'subheading_who',
        'who_copywriting',
        'hero_what_copywriting',
        'hero_case_studies_copywriting',
        'hero_contact_copywriting',
        'hero_landing_image',
        'about_landing_image_1',
        'about_landing_image_2',
        'about_landing_image_3',
        'about_landing_image_4',
        'video_landing_link',
        'hero_who_image',
        'hero_what_image',
        'hero_case_studies_image',
        'hero_contact_image',
        'app_logo',
    ];
}
