<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\EFacades\Storage;

class section extends Model
{
    use HasFactory;
    protected $fillable = ['title','thumbnail','content','post_as'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            if ($model->isDirty('thumbnail') && ($model->getOriginal(''))) {
                Storage::disk('public')->delete($model->getOriginal('thumbnail'));
            }
        });
    }
}
