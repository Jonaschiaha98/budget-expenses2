<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class budget extends Model
{
    use HasFactory;
    protected $fillable = [
        "duration", "description", "amount", "user_id"
    ];
    public function expenses()
    {
        return $this->hasMany(expenses::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
