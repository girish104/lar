<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Correct namespace for BelongsTo class

class Task extends Model
{
    protected $fillable = ['title', 'description', 'long_description'];

    public function toggleCompleted()
    {
        $this->completed = !$this->completed;
        $this->save();
    }

    /**
     * Get the user that owns the task.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
