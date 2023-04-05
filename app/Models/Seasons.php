<?php

namespace App\Models;

use App\Models\Episodes;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    use HasFactory;

    public function series(){
        return $this->belongsTo(Series::class);
    }

    public function episodes(){
        return $this->hasMany(Episodes::class);
    }

}
