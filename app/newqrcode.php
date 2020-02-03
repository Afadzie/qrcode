<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newqrcode extends Model
{
    protected $table = 'newqrcodes';
    protected $fillables = [
        'qrname',
        'qrmsg',
        'qrurl',
        'qraction'
    ];
}
