<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    public function scopeIsPublish($q)
    {
        return $q->where('blog_categories.status', '1');
    }
    
    public function scopeIsDraft($q)
    {
        return $q->where('blog_categories.status', '0');
    }

    public static function getColumns()
    {
        return Schema::getColumnListing('blog_categories');
    }
}
