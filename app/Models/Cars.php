<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name','cover','user_id','horses',
        'date_out','tax','name_model','price',
        'ville','Gearboxe',
        'motor','distance_km',
        'details','img'];



        public function user(){
            return $this->belongsTo(User::class);
        }

        public function images(){
            return $this->hasMany(Images::class);

        }

}

