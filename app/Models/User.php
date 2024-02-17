<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'number',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        $array['created_at'] = $this->getCreatedFromAttribute();

        return $array;
    }



    public function getCreatedFromAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans(null,true);
    }





}
