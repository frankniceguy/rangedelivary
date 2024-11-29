<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;


    protected $table = 'users'; // Set the table name
    protected $primaryKey = 'id'; // Set the primary key
    public $incrementing = true; // Define if the primary key is auto-incrementing
    protected $keyType = 'int'; // Define the primary key data type

    public function scopeStaff($query)
    {
        return $query->where('role', 'staff');
    }


    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
