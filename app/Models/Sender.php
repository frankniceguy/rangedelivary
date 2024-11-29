<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{

    public function recipients(){
        return $this->hasMany(Recipient::class);
    }

    protected $fillable = [
        'fullname','email','phone_number','address'
    ];

    public function couriers(){
        return $this->belongsToMany(Courier::class);
    }

    use HasFactory;
}
