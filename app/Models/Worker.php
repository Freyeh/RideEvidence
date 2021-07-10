<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameW',
        'personalNumber',
        'ID_city',
        'phone',
    ];


    public function city(){
        return $this->hasOne(City::class);
    }

    public function ride(){
        return $this->belongsTo(Ride::class);
    }
}
