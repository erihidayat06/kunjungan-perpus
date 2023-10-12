<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     public function scopeHariini($query)
    {
        $query->where('created_at', 'like', '%' . date('Y-m-d') . '%');
    }

     public function scopeGuru($query)
    {
        $query->where('jabatan', 'guru');
    }

     public function scopeKaryawan($query)
    {
        $query->where('jabatan', 'Karyawan');
    }

     public function scopeTanggal($query, $filters)
    {
        $query->where('created_at', 'like', '%' . $filters . '%');
    }


     public function scopeFiltertanggal($query,Array $filters){

        $query->when($filters['dari'] ?? false, function($query, $dari){
            return $query->where('updated_at', ">=" , $dari);
        });

        $query->when($filters['sampai'] ?? false, function($query, $sampai){
            return $query->where('updated_at', "<=" , date('Y-m-d', strtotime('+1 days', strtotime($sampai))));
        });

    }
}
