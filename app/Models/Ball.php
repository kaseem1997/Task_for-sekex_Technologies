<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    use HasFactory;
    public function bucket()
    {
        return $this->belongsTo(Bucket::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            Bucket::emptyBucket();
        });
    }
}
