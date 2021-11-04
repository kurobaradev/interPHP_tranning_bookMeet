<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Departments extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function getUser()
    {
       return $this->belongsTo(Departments::class,'id_department','id');
    }
}
