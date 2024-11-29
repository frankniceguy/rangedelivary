<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Courier extends Model
{

    use HasFactory;
    // protected $appends = ['location'];
    
    public function sender(){
        return $this->belongsTo(Sender::class,'sender_id');
    }

    public function recipient(){
        return $this->belongsTo(Recipient::class,'recipient_id');
    }
    
    public function scopeForUser(Builder $query, $user = null): Builder
    {
        if (\Route::current()->getName() === 'filament.resources.couriers.index' && request()->route('filament-panel') === 'user') {
            if (!$user) {
                $user = \Auth::user();
            }
            return $query->where('email', $user->email);
        }
    
        return $query; // No filtering for other routes/panels
    }

    public static function all($columns = []){
        return Courier::first();
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    // protected $casts = [
    //     'location' => 'object'
    // ];

}

