<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'status',
        'author_id',
        'id'
    ];
    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }


}
