<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenes extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'date','reference_no','expenes_type_id','price','exchange_rate','currency','total',
    ];

    public function expenes_type()
    {
    	return $this->belongsTo('App\Models\ExpenesType');
    }

    public function currency()
    {
    	return $this->belongsTo('App\Models\Currency');
    }

    public function exchange_rate()
    {
    	return $this->belongsTo('App\Models\ExchangeRate');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
