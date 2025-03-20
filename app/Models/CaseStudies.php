<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudies extends Model
{
    use HasFactory;

    public $table = 'case_studies';

    protected $fillable = [
        'title',
        'content',
        'image',
    ];
}
