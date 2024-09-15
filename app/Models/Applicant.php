<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email'];

    // Relationship: Applicant can have many lawsuits
    public function lawsuits()
    {
        return $this->hasMany(Lawsuit::class);
    }
}
