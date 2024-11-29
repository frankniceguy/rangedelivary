<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{


    public function sender(){
        return $this->belongsTo(Sender::class);
    }

    protected $fillable = [
        'fullname','email','phone_number','address','sender_id'
    ];
    use HasFactory;
}
