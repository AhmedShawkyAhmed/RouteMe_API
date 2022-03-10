<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'orderNumber',
        'driverId',
        'dispatcherId',
        'clientName',
        'clientPhone',
        'itemCount',
        'price',
        'vendorId',
        'branchId',
        'lon',
        'lat',
        'address',
        'start',
        'end',
        'comment',
        'status',
    ];
}
