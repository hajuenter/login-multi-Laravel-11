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
        // Inisialisasi query untuk memilih semua kolom dari tabel 'users' yang belum dihapus (hapus = 0)
        // dan mengurutkan hasilnya berdasarkan 'id' secara ascending.
        $return = self::select('users.*')
            ->where('hapus', '=', 0)
            ->orderBy('id', 'asc');
    
        // Memulai pengecekan filter berdasarkan parameter yang diterima dari request.
    
        // Filter berdasarkan 'id' user jika parameter 'id' tidak kosong
        if (!empty(Request::get('id'))) {
            $return = $return->where('users.id', '=', Request::get('id'));
        }
    
        // Filter berdasarkan 'name' user jika parameter 'name' tidak kosong
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%'. Request::get('name').'%');
        }
    
        // Filter berdasarkan 'username' user jika parameter 'username' tidak kosong
        if (!empty(Request::get('username'))) {
            $return = $return->where('users.username', 'like', '%'. Request::get('username').'%');
        }
    
        // Filter berdasarkan 'email' user jika parameter 'email' tidak kosong
        if (!empty(Request::get('email'))) {
            $return = $return->where('users.email', 'like', '%'. Request::get('email').'%');
        }
    
        // Filter berdasarkan 'phone' user jika parameter 'phone' tidak kosong
        if (!empty(Request::get('phone'))) {
            $return = $return->where('users.phone', 'like', '%'. Request::get('phone').'%');
        }
    
        // Filter berdasarkan 'website' user jika parameter 'website' tidak kosong
        if (!empty(Request::get('website'))) {
            $return = $return->where('users.website', 'like', '%'. Request::get('website').'%');
        }
    
        // Filter berdasarkan 'role' user jika parameter 'role' tidak kosong
        if (!empty(Request::get('role'))) {
            $return = $return->where('users.role', 'like', '%'. Request::get('role').'%');
        }
    
        // Filter berdasarkan 'status' user jika parameter 'status' tidak kosong
        if (!empty(Request::get('status'))) {
            $return = $return->where('users.status', '=', Request::get('status'));
        }
    
        // Filter berdasarkan rentang tanggal pembuatan user jika parameter 'start_date' dan 'end_date' tidak kosong
        if(!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('users.created_at', '>=', Request::get('start_date'))
                             ->where('users.created_at', '<=', Request::get('end_date'));
        }
        // Akhir pengecekan filter
    
        // Memisahkan hasil pencarian menjadi beberapa halaman dengan 10 item per halaman
        $return = $return->paginate(10);
    
        // Mengembalikan hasil query yang telah difilter dan dipaginate
        return $return;
    }
    
}
