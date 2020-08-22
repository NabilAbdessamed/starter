<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
   // protected $hidden = ['name'];
   protected $fillable=['name','price','details'];

   public $timestamps = false;
}
