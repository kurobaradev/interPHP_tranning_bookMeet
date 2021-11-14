<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;
    protected $guarded=[];
    protected $cascadeDeletes = ['tickets'];
    protected $dates = ['deleted_at'];


    public function tickets()
    {
        return $this->hasMany(Ticket::class,'room_id','id');
    }
}
