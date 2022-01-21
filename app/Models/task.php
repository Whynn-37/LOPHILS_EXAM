<?php

namespace App\Models;

use App\Models\task as ModelsTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'task',
        'status',
    ];   
   


}
