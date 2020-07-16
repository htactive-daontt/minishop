<?php

namespace App\Entities\Users;


use App\Notifications\SendMailRegister;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Users.
 *
 * @package namespace App\Entities\Users;
 */
class Users extends Authenticatable implements MustVerifyEmail
{
    use TransformableTrait;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'address', 'phone', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function role() {
        return $this->belongsTo('App\Entities\Roles\Roles','role_id');
    }

    public function report_bill() {
        return $this->hasMany('App\Entities\Bills\Bills','approver_id');
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new SendMailRegister());
    }
}
