<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Borrower extends Model
{
    protected $table = 'borrowers';

    public function inventory(): BelongsToMany
    {
        return $this->belongsToMany(Inventory::class, 'borrower_inventory');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
