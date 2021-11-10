<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomMeets extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function ticker()
    {
        return $this->hasOne(Tickets::class);
    }
}
