<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    public $table = 'social_media';

    protected $fillable = [
        'app',
        'name',
        'icon',
        'link',
    ];
}
