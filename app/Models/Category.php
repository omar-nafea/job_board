<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Category extends Model
{
    //

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'categories_posts');
    }
}
