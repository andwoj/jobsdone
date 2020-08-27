<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    protected $fillable = ['name', 'discription'];

    public function scopeAccomplished($query){
        return $query->whereNotNull('accomplished_at')->where('accomplished_at', '<=', Carbon::now());
    }
 
}
