<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'jurisdiction'];

  
    public function lawsuits()
    {
        return $this->hasMany(Lawsuit::class);
    }
}
