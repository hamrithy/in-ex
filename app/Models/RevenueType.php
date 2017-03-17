<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RevenueType extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'type','note'
    ];

    public function revenue()
    {
    	return $this->hasMany('App\Models\Revenue');
    }
}
