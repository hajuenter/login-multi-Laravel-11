<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getRecord($request) {
        $return = self::select('users.*')
        ->where('hapus', '=', 0)
        ->orderBy('id', 'asc');

        //cari user start
        if (!empty(Request::get('id'))) {
            $return = $return->where('users.id', '=', Request::get('id'));
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%'. Request::get('name').'%');
        }

        if (!empty(Request::get('username'))) {
            $return = $return->where('users.username', 'like', '%'. Request::get('username').'%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%'. Request::get('email').'%');
        }

        if (!empty(Request::get('phone'))) {
            $return = $return->where('users.phone', 'like', '%'. Request::get('phone').'%');
        }

        if (!empty(Request::get('website'))) {
            $return = $return->where('users.website', 'like', '%'. Request::get('website').'%');
        }

        if (!empty(Request::get('role'))) {
            $return = $return->where('users.role', 'like', '%'. Request::get('role').'%');
        }

        if (!empty(Request::get('status'))) {
            $return = $return->where('users.status', '=', Request::get('status'));
        }
        if(!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('users.created_at', '>=', Request::get('start_date'))->where('users.created_at', '<=', Request::get('end_date'));
        }
        //cari user end

        $return = $return->paginate(10);
        return $return;
    }
}
