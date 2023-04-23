<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CaseProgress extends Model
{
    public $table='case_progress';
    public $primaryKey='caseid';
    public $guarded=[];
}
