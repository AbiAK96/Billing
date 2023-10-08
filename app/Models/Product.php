<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product_name',
		'product_code',
        'description',
		'unit_price',
		'status_id',
        'organization_id'
    ];

    protected $casts = [
        'product_name' => 'string',
		'product_code' => 'string',
		'description' => 'string',
		'unit_price' => 'double',
		'status_id' => 'integer',
        'organization_id' => 'integer'
    ];

    public function status()
    {
    	return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }
}
