<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'server',
        'orderNumber',
        'driverId',
        'driver',
        'dispatcherId',
        'clientName',
        'clientPhone',
        'itemCount',
        'price',
        'vendorId',
        'vendor',
        'branch',
        'lon',
        'lat',
        'address',
        'start',
        'end',
        'comment',
        'status',
    ];
}
