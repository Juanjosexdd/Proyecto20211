<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable = ['id','nombre','slug','estados_id','created_at','updated_at'];
    
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

}