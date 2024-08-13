<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority-rank',
        'status_id',
        'techstack_ids',
        'difficulty_id',
        'icon',
        'gitrepo'
    ];

    protected $with = ['status', 'difficulty'];

    protected $casts = [
        'techstack_ids' => 'array',
    ];

    /*=====================================================================*/
    // RELATIONSHIP
    /*=====================================================================*/

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class);
    }

    /*=====================================================================*/
    // MODEL FUNCTION
    /*=====================================================================*/

    public static function countAll()
    {
        return static::count();
    }

    public static function displayProjects()
    {
        return static::orderBy('priorityrank', 'asc');
    }
}
