<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'ingredients', 'price', 'rate', 'types', 'picturePath'
    ];

    /*
    * function digunakan untuk format EpochConverter
    */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    /**
     * untuk mengakali format camelCast karena di laravel
     * harus menggunakan underscore untuk membaca format nama colum table
     * @return void
     */
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute()
    {
        // untuk membuat link saat akan di tampilkan pada view
        return config('app.url') . Storage::url($this->attributes['picturePath']);
    }
}
