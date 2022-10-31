<?php

/**
 * table users
 *
 * @author Eko Triono <saya@echo.web.id>
 * Other author:
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property string $fcm_token
 * @property string $remember_token
 * @property string $api_token
 * @property string $email_verified_at
 * @property string $google_id
 * @property string $facebook_id
 * @property integer $parent_id
 * @property integer $user_role_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property UserRole[] $userRole
 */
class User extends Authenticatable
{
    use SoftDeletes;

    const PENDING = 0;
    const ACTIVE = 1;
    const INACTIVE = 2;
    const SUSPENDED = 3;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userRole()
    {
        return $this->belongsTo('App\Models\UserRole', 'user_role_id');
    }

}
