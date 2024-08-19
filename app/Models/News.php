<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $tabel = 'news';

    protected $fillable = [
        'image',
        'title',
        'small_description',
        'description',
        'writer',
        'tanggal',
        'trending',
        'status',
        'top'
    ];
}
