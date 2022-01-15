<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentsModel extends Model
{
    protected $table = 'students';
    protected $fillable = ['fname','lname','email','pass'];
}
