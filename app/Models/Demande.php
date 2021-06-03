<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    public function materiel(){
        return $this->belongsTo(Materiel::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
