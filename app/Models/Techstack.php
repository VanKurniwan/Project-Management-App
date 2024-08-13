<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Techstack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'palette',
    ];

    protected $table = 'techstacks';
    protected $primaryKey = 'id';
}
