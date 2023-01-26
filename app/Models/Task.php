<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Task extends Model
{
    use HasFactory; 
    //use SoftDeletes, CascadeSoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'user_id',
        'deadline'
    ];
    protected $dates = ['deadline'];

    public function assigned()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function setDeadlineAttribute($deadline)
    {
        $this->attributes['deadline'] = $deadline ? Carbon::parse($deadline) : null;
    }
    public function scopeAllowed($query)
    {
        if(auth()->user()->can('view',$this))
            return $query;

        return $query->where('user_id',auth()->id());
    }

}
