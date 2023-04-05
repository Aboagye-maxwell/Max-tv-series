<?php

namespace App\Models;

use App\Models\Seasons;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;

    public function series(){
        return $this->belongsTo(Series::class);
    }

    public function seasons(){
        return $this->belongsTo(Seasons::class);
    }

}
