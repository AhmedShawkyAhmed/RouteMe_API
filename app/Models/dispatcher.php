<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dispatcher extends Model
{
    use HasFactory;
    protected $table = 'dispatchers';
    protected $fillable = ['server','name','email','password','phone'];
}
