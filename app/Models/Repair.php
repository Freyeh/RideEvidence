<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Repair extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'reason',
        'ID_car',
        'costEuro',
        'ID_city',
    ];

    protected $sortable = [
        'reason',
        'ID_car',
        'costEuro',
        'ID_city',
    ];

    public function car(){
        return $this->hasOne(Car::class);
    }

    public function city(){
        return $this->hasOne(City::class);
    }
}
