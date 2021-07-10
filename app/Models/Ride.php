<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\ColumnSortableServiceProvider;
use Kyslik\ColumnSortable\Sortable;

class Ride extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'ID_cityFrom',
        'ID_cityTo',
        'ID_worker',
        'ID_purpose',
        'ID_car',
        'fuelUsed',
        'cost',
    ];

    public $sortable = [
        'ID_cityFrom',
        'ID_cityTo',
        'ID_worker',
        'ID_purpose',
        'ID_car',
        'fuelUsed',
        'cost'];

    public function city(){
        return $this->hasMany(City::class);
    }

    public function worker(){
        return $this->hasOne(Worker::class);
    }

    public function purpose(){
        return $this->hasOne(Purpose::class);
    }

    public function car(){
        return $this->hasOne(Car::class);
    }
}
