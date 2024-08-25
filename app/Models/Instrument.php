<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    protected $table = 'instrument';
    public $timestamps = false;
    protected $fillable = ['date', 'name', 'place', 'designation', 'organisation', 'gender', 'age', 'expertise', 'qualification', 'experience'];
}
