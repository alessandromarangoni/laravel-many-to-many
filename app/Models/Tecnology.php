<?php

namespace App\Models;
use app\Models\portfolio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    use HasFactory;

    public function portfolios() {
        return $this->belongsToMany(portfolio::class);
    }
}
