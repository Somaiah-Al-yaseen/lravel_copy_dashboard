<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trips extends Model
{
    use HasFactory;
    protected $table = 'trips';
    
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }
    
}
