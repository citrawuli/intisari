<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customeer extends Model
{
    use HasFactory;

    protected $table = "customeer";
    protected $primaryKey = "id_customeer";
 
    protected $fillable = [
    	'id_customeer',
    	'nama_customer',
    	'alamat_customer',
    	'id_kelurahan',
    ];

    public $timestamps = false;
}
