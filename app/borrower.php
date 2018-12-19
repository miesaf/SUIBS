<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class borrower extends Model
{

    public function inventory()
    {
        return $this->belongsToMany(inventory::class);
    }
    public function user()
    {
        return $this->belongsTo(inventory::class);
    }
}
