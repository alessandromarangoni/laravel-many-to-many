<?php

namespace App\Models;
use App\Models\type;
use App\Models\Tecnology;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "image",
        'type_id'
    ];

    public function type(){
        return $this->belongsTo(type::class);
    }

    public function Tecnologies(){
        return $this->BelongsToMany(Tecnology::class);
    }
}
