<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawsuit extends Model
{
    use HasFactory;

    protected $fillable = ['lawsuit_name', 'citation', 'court_id', 'applicant_id', 'defendant_id', 'doc'];

    // Relationship: Lawsuit belongs to an applicant
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    // Relationship: Lawsuit belongs to a defendant
    public function defendant()
    {
        return $this->belongsTo(Defendant::class);
    }

    // Relationship: Lawsuit belongs to a court
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
