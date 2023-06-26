<?php

/**
 * table user_login
 *
 * @author Eko Triono <saya@echo.web.id>
 * Other author:
 * 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $ip_address
 * @property integer $device
 * @property integer $browser
 * @property string $created_at
 * @property string $updated_at
 */
class UserLogin extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'user_login';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'ip_address', 
        'device',
        'browser',
        'created_at', 
        'updated_at'
    ];

}
