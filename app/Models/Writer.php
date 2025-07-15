<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Writer extends Model
{
    //
    use HasFactory;
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'writers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password'];

     /**
     * Get all of the posts for the Writer.
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
