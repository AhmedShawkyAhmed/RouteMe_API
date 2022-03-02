<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['orderNumber','driverId','dispatcherId','clientName','clentPhone','itemCount','price','vendorId','branchId','lacation','start','end','comment','status'];
}
