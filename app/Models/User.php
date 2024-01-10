<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use Notifiable, CanResetPasswordTrait;

    protected $fillable = [
        'nama',
        'email',
        'gender',
        'umur',
        'username',
        'password',
    ];
}

