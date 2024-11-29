<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class UserCourier extends Model
{
    protected $table = "couriers";
    protected static function booted(): void
    {
        static::addGlobalScope('my', function (Builder $query) {
            if (auth()->check()) {
                $sender = Sender::where('email',auth()->user()->email)->first();
                if($sender){
                    $couriers = $sender->couriers;
                    return $couriers;
                }
            }
        });
    }

    use HasFactory;
}
