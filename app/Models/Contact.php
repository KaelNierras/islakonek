<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'island_id',
        'first_name',
        'last_name',
        'age',
        'mobile',
        'location',
        'longitude',
        'latitude',
    ];
}