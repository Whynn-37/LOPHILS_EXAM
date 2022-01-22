<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsFeed extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'Title',
        'ShortDetails',
        'Author',
        'DatePublish',
        'LastUpdatedBy'
    ];
}
