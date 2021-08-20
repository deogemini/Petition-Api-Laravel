<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    use HasFactory;

    //to allow mass asignment
    protected $fillable = ['title', 'description', 'category', 'author', 'signees']; //to be used in small amount of data
   // protected $guarded; // to be used in large amount of data 
}
