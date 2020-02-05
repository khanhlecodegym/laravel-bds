<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $fillable = ['ten_tinh', 'ma_tinh'];

    public function quans()
    {
        return $this->hasMany(Quan::class, 'tinh_id');
    }
}
