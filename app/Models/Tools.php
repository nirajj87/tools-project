<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tools extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','category', 'short_des', 'description', 'image', 'button_label', 'status','order',
    ];
}
