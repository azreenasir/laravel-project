<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /* more protected than guarded method as another user cant
        edit the content such as id */

    protected $fillable = ['title', 'slug', 'body', 'category_id'];


    /* use when only we can update and post the content on the server
        because another user can edit the content if using guarded method */


    // protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->BelongsToMany(Tag::class);
    }
}
