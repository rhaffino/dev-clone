<?php

namespace App\Models;

use App\Models\PageCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Page extends Model
{
    use SoftDeletes;

    protected $casts = [
        'status' => 'string',
    ];

    protected $guarded = [];

    public function category() 
    {
        return $this->belongsTo(PageCategory::class, 'page_category_id');
    }
    
    public function scopeIsDraft($q)
    {
        return $q->whereRaw("pages.status = '0'");
    } 
    
    public function scopeIsPublish($q)
    {
        return $q->whereRaw("pages.status = '1'");
    }
    
    public function scopeIsPublished($q)
    {
        return $q->whereRaw("pages.status = '1'")
            ->where('pages.published_at', '<=', now());
    }

    public static function getColumns()
    {
        return Schema::getColumnListing('pages');
    }
}
