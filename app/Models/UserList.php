<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class UserList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'user_list';

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
