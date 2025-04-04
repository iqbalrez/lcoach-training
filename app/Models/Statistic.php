<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    public $table = 'statistics';

    protected $fillable = [
        'title',
        'value',
        'icon',
    ];
}
