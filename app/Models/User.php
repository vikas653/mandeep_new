<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
      const ADMIN = 1;

    const CUSTOMER = 2;


    const TYPE = [
    self::ADMIN => 'Admin',
    self::CUSTOMER => 'Customer',
    ];


    const ACTIVE = 1;

    const DEACTIVE = 0;

    const STATUS = [
        self::ACTIVE => 'Active',
        self::DEACTIVE => 'Deactive',
    ];
    
    
   public function isAdmin()
    {
        if($this->role_id == 1)
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }
   
    public function isCustomer()
    {
        if($this->role_id == 2)
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }
}
