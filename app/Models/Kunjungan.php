<?php

namespace App\Models;

use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }


    // Scope
    public function scopeKelas($query, array $filters)
    {
        $query->when($filters['kelas'] ?? false, fn ($query, $kelas) => $query->whereHas(
            'ruangan',
            fn ($query) => $query->where('kelas', $kelas)
        ));
    }

    public function scopeBaca($query)
    {
        $query->where('tujuan', 'baca');
    }
    public function scopePinjam($query)
    {
        $query->where('tujuan', 'pinjam');
    }
    public function scopeKembali($query)
    {
        $query->where('tujuan', 'kembali');
    }
    public function scopeTugas($query)
    {
        $query->where('tujuan', 'tugas');
    }

    public function scopeTanggal($query, $filters)
    {
        $query->where('created_at', 'like', '%' . $filters . '%');
    }

    public function scopeHariini($query)
    {
        $query->where('created_at', 'like', '%' . date('Y-m-d') . '%');
    }

    public function scopeFiltertanggal($query, array $filters)
    {

        $query->when($filters['dari'] ?? false, function ($query, $dari) {
            return $query->where('updated_at', ">=", $dari);
        });

        $query->when($filters['sampai'] ?? false, function ($query, $sampai) {
            return $query->where('updated_at', "<=", date('Y-m-d', strtotime('+1 days', strtotime($sampai))));
        });
    }
}
