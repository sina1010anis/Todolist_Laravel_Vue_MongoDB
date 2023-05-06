<?php

namespace App\Models\MongoDB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'sub_task';

    protected $fillable = [
        'title',
        'task_id',
        'status',
    ];

}
