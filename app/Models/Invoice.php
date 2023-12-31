<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\Guard;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function section(){
        
        return $this->belongsTo(Section::class);
    }
    public function invoice_details()
    {
        return $this->hasMany(Invoice_details::class, 'invoice_id');
    }
   
}