<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerDetails extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $table = 'customer_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'organization_id',
        'first_name',
		'last_name',
		'address_line_1',
        'address_line_2',
		'city',
		'post_code',
		'country',
		'mobile_no',
        'email',
		'customer_id',
        'county',
		'status_id'
    ];

    public function status()
    {
    	return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }
}
