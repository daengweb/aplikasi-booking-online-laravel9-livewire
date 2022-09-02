<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySlot extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'quota', 'is_active'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
