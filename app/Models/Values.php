<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    use HasFactory;

    public $table = 'values';

    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}
