<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class PlagiarismCheckLog extends Model
{
    protected $guarded = [];

    protected $casts = ['result' => 'array'];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
