<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    public function borrower()
    {
        return $this->belongsToMany(borrower::class);
    }
}
