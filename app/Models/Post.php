<?php
// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Post extends Model
{
    use HasFactory;
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'body','writer_id'];

    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class, 'writer_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_posts');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        // When a new post is created...
        static::created(function (Post $post) {
            // ...get its writer and increment their post count.
            $post->writer->increment('num_of_posts');
        });

        // When a post is deleted...
        static::deleted(function (Post $post) {
            // ...get its writer and decrement their post count.
            $post->writer->decrement('num_of_posts');
        });
    }
}
