<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class PageType extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'show_on_homepage'
    ];
    public function pages()
    {
        return $this->hasMany(Page::class,'page_type_id');
    }

    public function Images(): MorphToMany
    {
        return $this->morphToMany(image::class, 'imageable');
    }
}
