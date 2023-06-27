<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Subscriber extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = []; 

    public static function getColumns()
    {
        return Schema::getColumnListing('subscribers');
    }
}
