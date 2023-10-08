<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $table = 'customers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const GENDER = [
        'Male' => 'Male',
        'Female' => 'Female'
    ];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name',
		'last_name',
		'address_line_1',
        'address_line_2',
		'city',
		'post_code',
		'country',
		'mobile_no',
        'email',
        'password',
        'county',
		'status_id',
        'email_verified_at'
    ];

    public function status()
    {
    	return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }
}
