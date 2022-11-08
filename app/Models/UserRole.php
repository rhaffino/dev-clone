<?php

/**
 * table user_role
 *
 * @author Eko Triono <saya@echo.web.id>
 * Other author:
 * 
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $name
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class UserRole extends Model
{
    use SoftDeletes;

    const ACTIVE = 1;
    const INACTIVE = 0;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'user_role';

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
        'name', 
        'status', 
        'created_at', 
        'updated_at',
        'deleted_at'
    ];

}
