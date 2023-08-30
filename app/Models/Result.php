<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_image',
        'fileName',
        'test1_result',
        'test2_result',
        'test3_result',
        'overall_result',
        'user_id',
    ];
}
