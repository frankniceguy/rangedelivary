<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = ["name"];
    use HasFactory;

    public function couriers(){
        return $this->hasMany(Courier::class);
    }

}
