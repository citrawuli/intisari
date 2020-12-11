<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $table = "customer";
    protected $primaryKey = "id_customer";
 
    protected $fillable = [
    	'id_customer',
    	'nama_customer',
    	'alamat_customer',
    	'foto',
    	'file_path',
    	'id_kelurahan',
    ];

    public $timestamps = false;
}
