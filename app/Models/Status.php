<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'palette',
    ];

    protected $table = 'statuses';
    protected $primaryKey = 'id';

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'status_id');
    }
}
