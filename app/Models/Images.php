<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cars;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images_cars';
    protected $fillable = [
        'img',
        'cars_id',
    ];
    public function cars(){
        return $this->belongsTo(Cars::class);
    }
}