<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenesType extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'type','note'
    ];

    public function expenes()
    {
    	return $this->hasMany('App\Models\Expenes');
    }
}
