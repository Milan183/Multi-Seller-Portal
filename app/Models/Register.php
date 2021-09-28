<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'register';
    protected $fillable = ['fname','lname','username','email','pwd','contact','city','state','contact','gender','role','birthdate','hobby','image','status'];
}
