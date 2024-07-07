<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ComposeEmailModel extends Model {
    use HasFactory;

    protected $table = 'compose_email'; //nama tabel yang ada di database

    // public $timestamps = false; // menonaktifkan timestamps

}