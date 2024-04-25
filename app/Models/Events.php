<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\EFacades\Storage;

class Events extends Model
{
    use HasFactory;
    protected $fillable = ['title','gambar','judul','deskripsi','tgl_event','tempat'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('gambar') && ($model->getOriginal(''))) {
                Storage::disk('public')->delete($model->getOriginal('gambar'));
            }
        });
    }
}
