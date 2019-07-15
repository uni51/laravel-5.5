<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Boot
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($user) {
            $user->messages()->delete();
        });
    }

    /**
     * A user has many messages
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    /**
     * ユーザーの一覧を取得（プルダウン用）
     */
    public static function getUserList()
    {
        return static::latest()->pluck('name', 'id');
    }
}
