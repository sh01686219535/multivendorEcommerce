<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fileable = [
      'text',
      'title',
      'btnUrl',
      'description',
      'image',
      'status',
      'serial'
    ];
}
