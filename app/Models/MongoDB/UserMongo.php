<?php

namespace App\Models\MongoDB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserMongo extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'users';
}
