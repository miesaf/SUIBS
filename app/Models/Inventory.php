<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Inventory extends Model
{
    protected $table = 'inventories';

    public function borrower(): BelongsToMany
    {
        return $this->belongsToMany(Borrower::class, 'borrower_inventory');
    }
}
