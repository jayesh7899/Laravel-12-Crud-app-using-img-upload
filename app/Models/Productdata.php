<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productdata extends Model
{
    //
    protected $fillable=['name','sku', 'price', 'description','image'];
}
