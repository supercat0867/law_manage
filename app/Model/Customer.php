<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table='customer';
    public $primaryKey='customer_id';
    public $guarded=[];

}
