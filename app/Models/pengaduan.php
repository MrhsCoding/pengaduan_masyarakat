<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// pengaduan model
class Pengaduan extends Model {
    // Define relationships
    public function masyarakat() {
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }
}

// Masyarakat model
class Masyarakat extends Model {
    // Define relationships
    public function pengaduan() {
        return $this->hasMany(Pengaduan::class, 'nik', 'nik');
    }
}