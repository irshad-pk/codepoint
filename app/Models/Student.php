<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function availableFrom(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y'),
            set: fn ($value) =>  Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d'),
        );
    }

    public function country()
    {
        return $this->belongsTo(Country::class); 
    }

    public function state()
    {
        return $this->belongsTo(State::class); 
    }
}
