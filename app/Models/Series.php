<?php

namespace App\Models;

use App\Models\Episodes;
use App\Models\Seasons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;


    public function seasons(){
        return $this->hasMany(Seasons::class);
    }

    public function episodes(){
        return $this->hasMany(Episodes::class);
    }


}
