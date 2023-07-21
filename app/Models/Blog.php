<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Blog extends Model
{
    use SoftDeletes;

    protected $guarded = []; 

    public function category() 
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
    
    public function scopeIsDraft($q)
    {
        return $q->where('blogs.status', '0');
    } 
    
    public function scopeIsPublish($q)
    {
        return $q->where('blogs.status', '1');
    }
    
    public function scopeIsPublished($q)
    {
        return $q->where('blogs.status', '1')
            ->where('blogs.published_at', '<=', now());
    }

    public static function getColumns()
    {
        return Schema::getColumnListing('blogs');
    }
}
