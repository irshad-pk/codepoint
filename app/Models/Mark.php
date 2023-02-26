<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::createFromFormat('Y-m-d', $value)->format('M d, Y H:i'),
            set: fn ($value) =>  Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d'),
        );
    }

    public function student()
    {
        return $this->belongsTo(Student::class); 
    }

    public function term()
    {
        return $this->belongsTo(Term::class); 
    }
}
