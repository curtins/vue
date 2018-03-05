<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataServiceAccess extends Model
{
    protected $guarded = [];

    public function DataService()
    {
        return $this->belongsTo('App\DataService');
    }
}
