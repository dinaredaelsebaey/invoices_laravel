<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\Guard;

class Invoice extends Model
{
    use HasFactory;

    protected $guard=[
        
    ];
    public function section(){
        
        return $this->belongsTo(Section::class);
    }
   
}