<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingItem extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $table = 'billing_items';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'organization_id',
		'billing_id',
        'product_id',
		'product_name',
        'unit_price',
        'quantity',
        'total_price'
    ];

    protected $casts = [
        'organization_id' => 'string',
		'billing_id' => 'integer',
        'product_id' => 'integer',
		'product_name' => 'string',
        'unit_price' => 'double',
        'quantity' => 'integer',
        'total_price' => 'double'
    ];

    public function product()
    {
    	return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
