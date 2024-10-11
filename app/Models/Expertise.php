<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Expertise extends Model
{
    use HasFactory;

    protected $table = 'expertises';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name'];
    protected $dates = ['created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

}
