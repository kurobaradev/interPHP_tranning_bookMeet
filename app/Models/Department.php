<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;

    protected $cascadeDeletes = ['users'];

    protected $dates = ['deleted_at'];
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class, 'department_id', 'id');
    }
}
