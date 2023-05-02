<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    use HasFactory;
    protected $fillable = [
        "description", "amount", "budget_id"
    ];

    public function budget()
    {
        return $this->belongsTo(budget::class);
    }
}
