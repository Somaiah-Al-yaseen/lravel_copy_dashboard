<?php

namespace App\Models;

use App\Models\users;
use App\Models\trips;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reservation extends Model
{
    
    use HasFactory;
    protected $table = 'reservatios';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the many-to-one relationship with Trip
    public function trip()
    {
        return $this->belongsTo(trips::class);
    }

}
