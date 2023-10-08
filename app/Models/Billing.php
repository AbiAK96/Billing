<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $table = 'billing';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'organization_id',
		'invoice_id',
        'customer_id',
		'invoice_reference',
        'payment_description',
        'additional_note',
        'payment_method',
        'payment_reference',
        'invoice_date',
        'net_price',
        'tax_price',
        'discount_price',
        'gross_price',
        'created_by',
        'status_id'
    ];

    protected $casts = [
        'organization_id' => 'integer',
		'invoice_id' => 'string',
        'customer_id' => 'integer',
		'invoice_reference' => 'string',
        'payment_description' => 'string',
        'additional_note' => 'string',
        'payment_method' => 'string',
        'payment_reference' => 'string',
        'invoice_date' => 'string',
        'net_price' => 'double',
        'tax_price' => 'double',
        'gross_price' => 'double',
        'discount_price' => 'double',
        'created_by' => 'string',
        'status_id' => 'integer'
    ];

    public function status()
    {
    	return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function customer()
    {
    	return $this->hasOne('App\Models\CustomerDetails', 'id', 'customer_id');
    }

    public function organization()
    {
    	return $this->hasOne('App\Models\Organization', 'id', 'organization_id');
    }
}
