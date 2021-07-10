<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Car extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'tankVolume',
        'productionYear',
        'color',
        'consumption'
    ];


    public function ride(){
        return $this->belongsTo(Ride::class);
    }

    public function repair(){
        return $this->belongsTo(Repair::class);
    }
}
