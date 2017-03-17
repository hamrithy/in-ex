<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revenue extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'date','reference_no','revenue_type_id','currency','price','exchange_rate','total',
    ];

    public function revenue_type()
    {
    	return $this->belongsTo('App\Models\RevenueType');
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
