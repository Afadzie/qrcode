<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class createqr extends Model
{
    protected $fillables = [

        'firstname',
        'lastname',
        'idnumber',
        'qrcodeurl',
        'qrcodename'
    ];
}
