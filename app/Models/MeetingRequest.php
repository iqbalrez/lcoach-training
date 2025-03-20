<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRequest extends Model
{
    use HasFactory;

    public $table = 'meeting_requests';

    protected $fillable = [
        'name',
        'email',
        'company',
        'date',
        'time',
    ];
}
