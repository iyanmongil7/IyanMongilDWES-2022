<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'autor', 'editorial', 'año', 'imagen'];
    
    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }


}
