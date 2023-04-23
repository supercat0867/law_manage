<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CaseInfo extends Model
{
    public $table='case';
    public $primaryKey='caseid';
    public $guarded=[];

}
