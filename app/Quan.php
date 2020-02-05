<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quan extends Model
{
    public function tinh()
    {
        return $this->belongsTo(Tinh::class, 'tinh_id');
    }
}
