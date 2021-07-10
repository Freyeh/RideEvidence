<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'ID_state',
    ];


    public function state(){
        return $this->hasOne(State::class);
    }

    public function ride(){
        return $this->belongsTo(Ride::class);
    }

    public function repair(){
        return $this->belongsTo(Repair::class);
    }

    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
