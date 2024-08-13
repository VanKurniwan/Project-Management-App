<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Difficulty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'palette',
    ];

    protected $table = 'difficulties';
    protected $primaryKey = 'id';

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'difficulty_id');
    }
}
