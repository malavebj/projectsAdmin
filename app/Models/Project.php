<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Project extends Model
{
    use HasFactory;
    //use SoftDeletes, CascadeSoftDeletes;
    protected $fillable = [
        'name',
        'mainObjective',
        'description',
        'user_id'
    ];
    
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function scopeAllowed($query)
    {
        if(auth()->user()->can('view',$this))
            return $query;

        return $query->where('user_id',auth()->id());
    }

}

